<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index() {
        $sort = request('sort');
        $genre = request("genre");

        if( $genre != null) {
            $books = Book::whereHas('genre', function($query) {
                $query->where('name', ("genre"));
            })->get();
        }


        if ($sort == 'low-to-high') {
            $books = Book::orderBy('price')->paginate(6);
        } elseif ($sort == 'high-to-low') {
            $books = Book::orderByDesc('price')->paginate(6);
        } elseif ($sort == 'bestsellers') {
            $books = Book::orderBy('title')->paginate(6);
        } else {
            $books = Book::paginate(6);
        }

        return view('catalog', ['books' => $books, 'sort' => $sort, "genre" => $genre]);
    }

    public function store() {
        #$cartItem = new Cart();
        #$cartItem->book_id = request("book_id");

        error_log(request("book_id"));
        return redirect("/katalog");
    }

    public function show($id) {
        $book = Book::findorFail($id);
        return view('bookProfile', ['book' => $book]);
    }
}
