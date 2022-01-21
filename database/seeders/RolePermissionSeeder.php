<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'view users']);
        // Permission::create(['name' => 'add users']);
        // Permission::create(['name' => 'edit users']);
        // Permission::create(['name' => 'delete users']);

        // $role=Role::create(["name"=>"super-admin"]);


        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'admin@m.com',
        // ]);
        // $user->assignRole($role);

        for($i=1; $i<21; $i++){
            Permission::create(['name' => "view page $i"]);
        }
    }
}
