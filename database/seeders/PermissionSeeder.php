<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_destroy',

            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',

            'user_index',
            'user_create',
            'user_show',
            'user_edit',
            'user_destroy',

            'capitania_index',
            'capitania_create',
            'capitania_show',
            'capitania_edit',
            'capitania_destroy',

            'marina_index',
            'marina_create',
            'marina_show',
            'marina_edit',
            'marina_destroy',
        ];


        foreach($permissions as $permission){
            Permission::create([
                    'name'=>$permission
                ]);
        }


    }
}
