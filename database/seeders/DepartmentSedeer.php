<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSedeer extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
            [
                'name' => 'Human Resources',
                'description' => '_',
            ],
        ];
        
       foreach($departments as $department) {
            Department::create($department);
        }
    }
}
