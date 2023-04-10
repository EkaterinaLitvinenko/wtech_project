<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class CatalogController extends Controller {
    public function index() {
        $books = Book::query();

        $q = request("q");
        if ($q) {
            $books = $books->authors()
                    ->whereRaw('LOWER(authors.first_name) LIKE ?', ['%' . strtolower($q) . '%'])
                    ->orWhereRaw('LOWER(authors.last_name) LIKE ?', ['%' . strtolower($q) . '%'])
                    ->orWhereRaw('LOWER(books.title) LIKE ?', ['%' . strtolower($q) . '%'])
                    ->orWhereRaw('LOWER(books.isbn) LIKE ?', ['%' . strtolower($q) . '%'])
                    ->orWhereRaw('LOWER(books.description) LIKE ?', ['%' . strtolower($q) . '%'])
                    ->distinct();
        }

        //filtrovanie podla typu (ekniha/kniha/audiokniha)
        $type = request("type");
        if($type) {
            $types = explode(',', $type);
            $books = $books->where(function ($query) use ($types) {
                foreach ($types as $type) {
                    switch ($type) {
                        case 'kniha':
                            $query->orWhere(function($subQuery) {
                                $subQuery->where('type', 'pevna')
                                    ->orWhere('type', 'brozovana');
                            });
                            break;
                        case 'audiokniha':
                        case 'ekniha':
                            $query->orWhere('type', $type);
                            break;
                        default:
                            break;
                    }
                }
            });
        }
        
        //filtrovanie podla zanru
        $genre = request("genre");
        if($genre) {
            $books = $books->whereHas('genre', function($query) use ($genre) {
                $genre = explode(',', $genre);
                $query->whereIn('name', $genre);
            });
        }

        //filtrovanie podla jazyka
        $lang = request("lang");
        if($lang) {
            $lang_ = explode(",", $lang);
            $books = $books->whereIn('language', $lang_);
        }

        //filtrovanie podla poctu stran
        $pages = request('pages');
        if ($pages) {
            $pageRanges = explode(',', $pages);
            $books = $books->where(function($query) use ($pageRanges) {
                foreach ($pageRanges as $range) {
                    list($min, $max) = explode('-', $range);
                    $query->orWhereBetween('page_count', [$min, $max]);
                }
            });
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
            $books->orderBy('created_at', "desc");
        } 

        $books = $books->paginate(6);

        return view('catalog', ['books' => $books, 'q' => $q, 'type' => $type, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => $sort]);
    }

    public function show($id) {
        $book = Book::findorFail($id);
        return view('bookProfile', ['book' => $book]);
    }
}
