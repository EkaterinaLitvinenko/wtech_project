<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;

class CatalogController extends Controller {
    public function index() {
        $books = Book::query();
        $page_title = "";

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

            if (strpos($type, ',') === false) {
                if($type === "audiokniha") $page_title = "Všetky audioknihy";
                else if($type === "ekniha") $page_title = "Všetky eKnihy";
            }
        }

        //filtrovanie podla zanru
        $genre = request("genre");
        if($genre) {
            $genres = explode(",", $genre);
            $books = $books->whereIn('genre_id', $genres);
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
        } else {
            $books->orderBy('created_at', "desc");
        }

        $q = request("q");
        if ($q) {
            $splitedQuery = array_filter(explode(' ', $q));
            foreach($splitedQuery as $search) {
                $books = $books->where(function ($query) use ($search) {
                    $query->whereHas('authors', function ($query) use ($search) {
                        $query->whereRaw('LOWER(authors.first_name) LIKE ?', ['%' . strtolower($search) . '%'])
                            ->orWhereRaw('LOWER(authors.last_name) LIKE ?', ['%' . strtolower($search) . '%']);
                    })
                        ->orWhereRaw('LOWER(books.title) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(books.isbn) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(books.description) LIKE ?', ['%' . strtolower($search) . '%']);
                });
            };
            $books = $books->distinct();

            $page_title = 'Výsledky pre "' . $q . '"' ;
        }

        if($page_title == "") $page_title = "Všetky knihy";

        $books = $books->paginate(6);

        $books_transform = [];
        foreach($books as $book){
            $rating=round(mt_rand()/mt_getrandmax() * 5,2);
            $author_str = '';
            $description= str_replace(["\n","\r"], " ",$book->description );
            foreach ($book->authors as $author) {
                $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
            }
            $author_str=rtrim($author_str,', ');
            $image = config('constants.IMAGE_DIR') . $book->photos->where('is_cover', true)->first()->filename;

            array_push($books_transform, (object)[
                "book" => $book,
                "rating" => $rating,
                "authors" => $author_str,
                "image" => $image,
                "description" => $description
            ]);
        }

        $genres = Genre::all();

        return view('catalog', ['booksQ' => $books, 'genres' => $genres, 'books' => $books_transform, 'q' => $q, 'type' => $type, 'genre' => $genre, 'lang' => $lang, 'pages' => $pages, 'sort' => $sort, 'page_title' => $page_title]);
    }

    public function show($id) {
        $book = Book::findorFail($id);

        $rating=round(mt_rand()/mt_getrandmax() * 5,2);
        $description= str_replace(["\n","\r"], " ",$book->description );

        $author_str = '';
        foreach ($book->authors as $author) {
            $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
        }
        $author_str=rtrim($author_str,', ');

        $filenames = [];
        $photos = $book->photos;
        foreach ($photos as $photo) {
            $filenames[] = $photo->filename;
        }
        $cover = $book->photos->where('is_cover', true)->first()->filename;

        return view('bookProfile', ['book' => $book, 'cover' => $cover, 'rating' => $rating, 'description' => $description, 'authors' => $author_str, 'filenames' => $filenames ]);
    }
}
