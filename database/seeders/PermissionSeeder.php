<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permission untuk mengelola users
    Permission::updateORcreate(['name' => 'show users']);
    Permission::updateORcreate(['name' => 'add users']);
    Permission::updateORcreate(['name' => 'edit users']);
    Permission::updateORcreate(['name' => 'delete users']);

    //permission untuk mengelola Departemen
    Permission::updateORcreate(['name' => 'show departments']);
    Permission::updateORcreate(['name' => 'add departments']);
    Permission::updateORcreate(['name' => 'edit departments']);
    Permission::updateORcreate(['name' => 'delete departments']);

    //permission untuk mengelola Emloyees
    Permission::updateORcreate(['name' => 'show employee']);
    Permission::updateORcreate(['name' => 'add employee']);
    Permission::updateORcreate(['name' => 'edit employee']);
    Permission::updateORcreate(['name' => 'delete employee']);

    //permision untuk mengelola Payroll
    Permission::updateORcreate(['name' => 'show payroll']);
    Permission::updateORcreate(['name' => 'add payroll']);
    Permission::updateORcreate(['name' => 'edit payroll']);
    Permission::updateORcreate(['name' => 'delete payroll']);

    //permission untuk mengelola Leave
    Permission::updateORcreate(['name' => 'show Leave']);
    Permission::updateORcreate(['name' => 'add Leave']);
    Permission::updateORcreate(['name' => 'edit Leave']);
    Permission::updateORcreate(['name' => 'delete Leave']);

    //permission untuk mengelola presence
    Permission::updateORcreate(['name' => 'show presence']);
    Permission::updateORcreate(['name' => 'add presence']);
    Permission::updateORcreate(['name' => 'edit presence']);
    Permission::updateORcreate(['name' => 'delete presence']);


    }
}
