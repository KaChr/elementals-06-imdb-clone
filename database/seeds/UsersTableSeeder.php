<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Delete users when seeding and then add new ones
        DB::table('users')->delete();

        //Add admin user when seeding
        User::create(array(
            'name' => 'Izabel', 
            'email' => 'izabel@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));

        User::create(array(
            'name' => 'Joakim', 
            'email' => 'joakim@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));

        User::create(array(
            'name' => 'Zav', 
            'email' => 'zav@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));

        User::create(array(
            'name' => 'Gabriel', 
            'email' => 'gabriel@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));

        User::create(array(
            'name' => 'Karin', 
            'email' => 'karin@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));

        User::create(array(
            'name' => 'Kaveh', 
            'email' => 'kaveh@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));
        
        User::create(array(
            'name' => 'Axel', 
            'email' => 'axel@emdb.com',
            'password' => bcrypt('elem'),
            'type' => 'admin'
            ));



        //Add 50 fake users
        factory(App\User::class, 50)->create();

    }
}
