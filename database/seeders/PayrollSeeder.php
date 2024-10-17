<?php

namespace Database\Seeders;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $employees = Employee::inRandomOrder()->take(5)->get();
    foreach ($employees as $employee) {
        Payroll::create([
            'user_id' => $employee->user_id, 
            'salary' => rand(3000000, 10000000), 
            'created_at' => now(), 
        ]);
    }
}
}
