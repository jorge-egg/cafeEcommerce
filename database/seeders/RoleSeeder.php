<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Client']);
    
        Permission::create(['name' => 'admin.home'])->assignRole($role1);
        Permission::create(['name' => 'admin.categories.products'])->assignRole($role1);
        Permission::create(['name' => 'admin.users'])->assignRole($role1);
       

    
    }
}
