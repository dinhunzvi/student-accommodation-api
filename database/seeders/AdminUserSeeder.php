<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Douglas Nhunzvi',
            'email' => 'dougiedj@gmail.com',
            'password' => bcrypt('password'),
            'role_id'  => 1
        ]);
    }
}
