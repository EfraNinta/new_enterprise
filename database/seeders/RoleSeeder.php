<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //membeuat role user / level user
    $admin = Role::updateORcreate(['name' => 'admin']);
    $operator = Role::updateORcreate(['name' => 'operator']);

    //memberikan akses ke role admin
    $admin->givePermissionTo(Permission::all());

    //operator
    $operator->givePermissionTo('show users','add users','edit users');
    }
}
