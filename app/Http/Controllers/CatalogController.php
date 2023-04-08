<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index() {
        $books = Book::query();

        //filtrovanie podla typu (ekniha/kniha/audiokniha)
        $type = request("type");
        if($type) {
            if($type === "kniha") {
                $books = $books->where(function ($query) {
                    $query->where('type', 'pevna')
                        ->orWhere('type', 'brozovana');
                });
            } else {
                $books = $books->where('type', $type);
            }
        }
        
        //filtrovanie podla zanru
        $genre = request("genre");
        if($genre) {
            $books = Book::whereHas('genre', function($query) use ($genre) {
                $query->where('name', $genre);
            });
        }

        //filtrovanie podla jazyka
        $language = request("language");
        if($language) {
            $books = $books->where('language', $language);
        }

        //filtrovanie podla poctu stran
        $pages = request('pages');
        if ($pages) {
            list($min, $max) = explode('-', $pages);
            $books = $books->whereBetween('page_count', [$min, $max]);
        }

        //sortovacie metody
        $sort = request('sort');
        if ($sort === 'bestsellers') {
            $books->orderBy('title');
        } elseif ($sort === 'high-to-low') {
            $books->orderBy('price', "desc");
        } elseif ($sort === 'low-to-high') {
            $books->orderBy('price');
        } elseif ($sort === 'novinky') {
            $books->inRandomOrder();
        } 

        $books = $books->paginate(6);

        return view('catalog', ['books' => $books, 'sort' => $sort, 'genre' => $genre, 'language' => $language, 'pages' => $pages, 'type' => $type]);
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
