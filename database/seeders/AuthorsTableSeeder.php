<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {

    
        DB::table('authors')->insert([
            ['first_name' => 'Hermann', 'last_name' => 'Hesse'],
            ['first_name' => 'Elena', 'last_name' => 'Ferrante'],
            ['first_name' => 'Haruki', 'last_name' => 'Murakami'],
            ['first_name' => 'Agota', 'last_name' => 'Kristof'],
            ['first_name' => 'John', 'last_name' => 'Ironmonger'],
            ['first_name' => 'Samuel', 'last_name' => 'Bjork'],
            ['first_name' => 'John', 'last_name' => 'Douglas'],
            ['first_name' => 'Mark', 'last_name' => 'Olshaker'],
            ['first_name' => 'Richard', 'last_name' => 'Osman'],
            ['first_name' => 'Jo', 'last_name' => 'Nesbo'],
            ['first_name' => 'Jeff', 'last_name' => 'Kinney'],
            ['first_name' => 'Thomas C.', 'last_name' => 'Brezina'],
            ['first_name' => 'Josef', 'last_name' => 'Čapek'],
            ['first_name' => 'Alan Alexander', 'last_name' => 'Milne'],
            ['first_name' => 'Antoine', 'last_name' => 'De Saint-Exupéry'],
            ['first_name' => 'Neil', 'last_name' => 'Gaiman'],
            ['first_name' => 'Terry', 'last_name' => 'Pratchett'],
            ['first_name' => 'J.R.R.', 'last_name' => 'Tolkien'],
            ['first_name' => 'George R.R.', 'last_name' => 'Martin'],
            ['first_name' => 'Leigh', 'last_name' => 'Bardugo'],
            ['first_name' => 'Madeline', 'last_name' => 'Miller'],
            ['first_name' => 'Viola', 'last_name' => 'Stern Fischerová'],
            ['first_name' => 'Veronika', 'last_name' => 'Homolová Tóthová'],
            ['first_name' => 'Erich Maria', 'last_name' => 'Remarque'],
            ['first_name' => 'Markus', 'last_name' => 'Zusak'],
            ['first_name' => 'Jonas', 'last_name' => 'Jonasson'],
            ['first_name' => 'Ľubomír', 'last_name' => 'Feldek'],
            ['first_name' => 'Joseph', 'last_name' => 'Heller'],
            ['first_name' => 'Milan', 'last_name' => 'Lasica'],
            ['first_name' => 'Július', 'last_name' => 'Satinský'],
            ['first_name' => 'Fredrik', 'last_name' => 'Backman'],
            ['first_name' => 'Colm', 'last_name' => 'Tóibín'],
            ['first_name' => 'Louisa May', 'last_name' => 'Alcott'],
            ['first_name' => 'John', 'last_name' => 'Green'],
            ['first_name' => 'Stephanie', 'last_name' => 'Garber'],
            ['first_name' => 'Rainbow', 'last_name' => 'Rowell'],
            ['first_name' => 'Kurt', 'last_name' => 'Vonnegut'],
            ['first_name' => 'Aldous', 'last_name' => 'Huxley'],
            ['first_name' => 'Anthony', 'last_name' => 'Doerr'],
            ['first_name' => 'Patrick', 'last_name' => 'Ness'],
            ['first_name' => 'Ray', 'last_name' => 'Bradbury'],
            ['first_name' => 'Marc-Uwe', 'last_name' => 'Kling'],
            ['first_name' => 'Stieg', 'last_name' => 'Larsson'],
            ['first_name' => 'Howard Phillips', 'last_name' => 'Lovecraft'],
            ['first_name' => 'Tana', 'last_name' => 'French'],
            ['first_name' => 'Benjamin', 'last_name' => 'Alire Saenz'],
            ['first_name' => 'Jennifer', 'last_name' => 'Niven'],
            ]);
    }
}