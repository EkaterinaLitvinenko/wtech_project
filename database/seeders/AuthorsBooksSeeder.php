<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorsBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('author_book')->insert([
            ['book_id' => 1, 'author_id' => 1],
            ['book_id' => 2, 'author_id' => 2],
            ['book_id' => 3, 'author_id' => 2],
            ['book_id' => 4, 'author_id' => 2],
            ['book_id' => 5, 'author_id' => 2],
            ['book_id' => 6, 'author_id' => 3],
            ['book_id' => 7, 'author_id' => 4],
            ['book_id' => 8, 'author_id' => 5],
            ['book_id' => 9, 'author_id' => 6],
            ['book_id' => 10, 'author_id' => 7],
            ['book_id' => 10, 'author_id' => 8],
            ['book_id' => 11, 'author_id' => 9],
            ['book_id' => 12, 'author_id' => 9],
            ['book_id' => 13, 'author_id' => 9],
            ['book_id' => 14, 'author_id' => 16],
            ['book_id' => 14, 'author_id' => 17],
            ['book_id' => 15, 'author_id' => 18],
            ['book_id' => 16, 'author_id' => 18],
            ['book_id' => 17, 'author_id' => 18],
            ['book_id' => 18, 'author_id' => 19],
            ['book_id' => 19, 'author_id' => 20],
            ['book_id' => 29, 'author_id' => 21],
            ['book_id' => 20, 'author_id' => 22],
            ['book_id' => 21, 'author_id' => 23],
            ['book_id' => 22, 'author_id' => 24],
            ['book_id' => 23, 'author_id' => 25],
            ['book_id' => 24, 'author_id' => 26],
            ['book_id' => 25, 'author_id' => 27],
            ['book_id' => 26, 'author_id' => 28],
            ['book_id' => 27, 'author_id' => 31],
            ['book_id' => 28, 'author_id' => 11],
            ['book_id' => 29, 'author_id' => 12],
            ['book_id' => 30, 'author_id' => 13],
            ['book_id' => 31, 'author_id' => 14],
            ['book_id' => 32, 'author_id' => 15],
            ['book_id' => 33, 'author_id' => 32],
            ['book_id' => 34, 'author_id' => 33],
            ['book_id' => 35, 'author_id' => 35],
            ['book_id' => 36, 'author_id' => 36],
            ['book_id' => 37, 'author_id' => 37],
            ['book_id' => 38, 'author_id' => 38],
            ['book_id' => 39, 'author_id' => 39],
            ['book_id' => 40, 'author_id' => 41],
            ['book_id' => 41, 'author_id' => 42],
            ['book_id' => 42, 'author_id' => 43],
            ['book_id' => 43, 'author_id' => 44],
            ['book_id' => 44, 'author_id' => 43],
            ['book_id' => 45, 'author_id' => 45],
            ['book_id' => 46, 'author_id' => 46],
            ['book_id' => 47, 'author_id' => 46],
            ['book_id' => 48, 'author_id' => 36],
            ['book_id' => 49, 'author_id' => 36],
            ['book_id' => 50, 'author_id' => 40],
        ]);
    }
}
