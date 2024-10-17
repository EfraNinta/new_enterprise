<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adi = User::updateORcreate([
            'name' => 'adi',
            'email' => 'adi@email.com',
            'password' => bcrypt('password'),
        ]);
        $adi->assignRole('admin');

        $budi = User::updateORcreate([
            'name' => 'Budi',
            'email' => 'budi@email.com',
            'password' => bcrypt('password'),
        ]);
        $budi->assignRole('operator');

        $cindy = User::updateORcreate([
            'name' => 'cindy',
            'email' => 'cindy@email.com',
            'password' => bcrypt('password'),
        ]);
        $cindy->assignRole('operator'); //role
        $cindy->givePermissionTo('delete users'); //memberikan akses permission langsung
    }
}
