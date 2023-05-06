<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
         DB::table('users')->insert([
            ['email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'first_name' => 'Jonh',
            'last_name' => 'Doe',
            'role' => 'admin'],
            ]);
    }
}





