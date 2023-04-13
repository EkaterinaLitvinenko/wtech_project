<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            ['name' => 'Beletria', 'color' => '#FFA55A'],
            ['name' => 'Detektívky', 'color' => '#FF6D5F'],
            ['name' => 'Fantasy', 'color' => '#BFAFFF'],
            ['name' => 'Historický', 'color' => '#CFAD92'],
            ['name' => 'Humorný', 'color' => '#FFE08F'],
            ['name' => 'PreDeti', 'color' => '#B3F4FF'],
            ['name' => 'Romantický', 'color' => '#FF91B2'],
            ['name' => 'Sci-fi', 'color' => '#90A9FF'],
            ['name' => 'TrilerAHoror', 'color' => '#ADADAD'],
            ['name' => 'YoungAdult', 'color' => '#B2D19B'],
        ]);
    }
}