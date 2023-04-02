<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index() {
        $sort = request('sort');

        if ($sort == 'low-to-high') {
            $books = Book::orderBy('price')->paginate(6);
        } elseif ($sort == 'high-to-low') {
            $books = Book::orderByDesc('price')->paginate(6);
        } elseif ($sort == 'bestsellers') {
            $books = Book::orderBy('title')->paginate(6);
        } else {
            $books = Book::paginate(6);
        }
        
        return view('catalog', ['books' => $books, 'sort' => $sort]);
    }
}
