<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::FirstOrCreate(
            ['username' => 'superadmin'],
            [
            'name' => 'Super Admin',
            'password' => Hash::make('150726'),
            ]
        );
        $superAdmin->assignRole('superadmin');

        $admin = User::firstOrCreate(
            ['username' => 'admin'],
            [
            'name' => 'Admin',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $operator = User::firstOrCreate(
            ['username' => 'operator'],
            [
            'name' => 'Operator',
            'password' => Hash::make('password'),
        ]);
        $operator->assignRole('operator');
    }
}
