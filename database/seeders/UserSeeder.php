<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Manager',
            'role_id'=>1,
            'email'=>'managaer@gmail.com',
            'password'=>Hash::make('secret'),
        ]);
        User::create([
            'name'=>'user',
            'role_id'=>2,
            'email'=>'user@gmail.com',
            'password'=>Hash::make('secret'),
        ]);
    }
}