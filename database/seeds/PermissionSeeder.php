<?php

use Illuminate\Database\Seeder;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            'admin',
            //'accountant',
            'user'
        ];

        $permissions=[
            'dashboard'=>['admin'],
			'file-manager'=>['admin'],
			'langfile-manager'=>['admin'],
			'backup-manager'=>['admin'],
			'log-manager'=>['admin'],
			'settings'=>['admin'],
			'page-manager'=>['admin'],
			'permission-manager'=>['admin'],
			'menu-crud'=>['admin'],
			'news-crud '=>['admin'],
        ];

        //Create roles
        foreach ($roles as $role) {
            $rolesArray[$role]=User::create(['name' => $role]);
        }

        //Create permissions
        foreach ($permissions as $permission => $authorized_roles) {

            //Create permission
            Permission::create(['name' => $permission]);

            //Authorized roles to permissions 
            foreach ($authorized_roles as $role) {
                $rolesArray[$role]->givePermissionTo($permission);
            }
        }
    }
}
