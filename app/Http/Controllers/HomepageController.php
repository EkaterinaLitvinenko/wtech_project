<?php

namespace App\Http\Controllers;
use App\Models\Book;

class HomepageController extends Controller
{
    public function index() {
        $books = Book::inRandomOrder()->limit(10)->get();
        $books_transform = [];
        foreach($books as $book){
            $rating=round(mt_rand()/mt_getrandmax() * 5,2);
            $author_str = '';
            $description= str_replace(["\n","\r"], " ",$book->description );
            $image = config('constants.IMAGE_DIR') . $book->photos->first()->filename;
            foreach ($book->authors as $author) {
                $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
            }
            $author_str=rtrim($author_str,', ');

            array_push($books_transform, (object)[
                "book" => $book,
                "rating" => $rating,
                "authors" => $author_str,
                "image" => $image,
                "description" => $description
            ]);
        }

        $top_books = Book::inRandomOrder()->limit(6)->get();
        $top_books_transform = [];
        foreach($top_books as $book){
            $rating=round(mt_rand()/mt_getrandmax() * 5,2);
            $author_str = '';
            $description= str_replace(["\n","\r"], " ",$book->description );
            $image = config('constants.IMAGE_DIR') . $book->photos->first()->filename;
            foreach ($book->authors as $author) {
                $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
            }
            $author_str=rtrim($author_str,', ');

            array_push($top_books_transform, (object)[
                "book" => $book,
                "rating" => $rating,
                "authors" => $author_str,
                "image" => $image,
                "description" => $description
            ]);
        }

        return view('homepage', ['books' => $books_transform, 'topBooks' => $top_books_transform]);
    }
}
