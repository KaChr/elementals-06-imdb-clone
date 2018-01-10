<?php
namespace Deployer;

// require 'recipe/npm.php';
require 'recipe/laravel.php';

// Project name
set('application', 'elementals');

// Project repository
set('repository', 'git@github.com:chas-academy/elementals-06-imdb-clone.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', ['storage']);

// Writable dirs by web server 
add('writable_dirs', ['storage']);
set('allow_anonymous_stats', false);

// Npm
set('bin/npm', function () {
    return run('which npm');
});

desc('Install npm packages');
task('npm:install', function () {
    if (has('previous_release')) {
        if (test('[ -d {{previous_release}}/node_modules ]')) {
            run('cp -R {{previous_release}}/node_modules {{release_path}}');
        }
    }
    run("cd {{release_path}} && {{bin/npm}} install");
});

// Hosts
host('www.lanayru.me')
    ->stage('production')
    ->set('branch', 'master')
    ->set('deploy_path', '/var/www/www.lanayru.me')
    ->user('elem')
    ->IdentityFile('~/.ssh/id_digitalocean')
    ->port(22);

host('develop.lanayru.me')
    ->stage('develop')
    ->set('branch', 'feature/landingpage')
    ->set('deploy_path', '/var/www/develop.lanayru.me')
    ->user('elem')
    ->IdentityFile('~/.ssh/id_digitalocean')
    ->port(22);

host('staging.lanayru.me')
    ->stage('staging')
    ->set('branch', 'develop')
    ->set('deploy_path', '/var/www/staging.lanayru.me')
    ->user('elem')
    ->IdentityFile('~/.ssh/id_digitalocean')
    ->port(22);

    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

//Restart Php-fpm
desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    run('sudo service php7.0-fpm reload');
});

//Seed database from api
desc('Seed database from api');
task('api:movies', function () {
    run('{{bin/php}} {{release_path}}/artisan api:movies');
});

//Dump Autoload
desc('Dump autoload before seed');
task('dump-autoload', function () {
    $output = run('cd {{release_path}} && composer dump-autoload');
    writeln('<info>' . $output . '</info>');
});

after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


// Migrate database before symlink new release.
desc('Execute artisan migrate:fresh');
task('artisan:migrate:fresh', function () {
    run('{{bin/php}} {{release_path}}/artisan migrate:fresh');
});

// Migrate database before symlink new release.
desc('Build production');
task('npm-production', function () {
    run("cd {{release_path}} && {{bin/npm}} run production");
});

desc('Build dev');
task('npm-dev', function () {
    run("cd {{release_path}} && {{bin/npm}} run dev");
});

after('deploy:update_code', 'npm:install');
after('npm:install', 'npm-production');
// after('npm:install', 'npm-dev');

before('deploy:symlink', 'artisan:migrate:fresh');
after('artisan:migrate:fresh', 'api:movies');
after('api:movies', 'dump-autoload');
after('dump-autoload', 'artisan:db:seed');




