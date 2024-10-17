<?php

namespace Database\Seeders;

use App\Models\Emlpoyee;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'user_id' => 1,
                'department_id' => 1,
                'address' => 'jl.santai',
                'place_of_birth' => 'oekanbaru',
                'dob' =>'2004-12-02',
                'religion' => 'Islam',
                'sex' => 'Male',
                'phone' => '1231412',
                'salary' => '010910239',
            ],
            
        ];
        
       foreach($employees as $employee) {
            Employee::create($employee);
        }
    }
}
