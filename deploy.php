<?php
namespace Deployer;

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

// Hosts

host('95.85.5.109')
    ->stage('production')
    ->set('branch', 'master')
    ->set('deploy_path', '/var/www/www.lanayru.me')
    ->user('elem')
    ->IdentityFile('~/.ssh/id_digitalocean')
    ->port(22);

host('95.85.5.109')
    ->stage('develop')
    ->set('branch', 'develop')
    ->set('deploy_path', '/var/www/develop.lanayru.me')
    ->user('elem')
    ->IdentityFile('~/.ssh/id_digitalocean')
    ->port(22);

host('95.85.5.109')
    ->stage('staging')
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

after('deploy:symlink', 'php-fpm:restart');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');



