<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomepageController extends Controller
{
    public function index() {
        return view('homepage', [
            'books'=>Book::inRandomOrder()->limit(10)->get(),
            'topBooks'=>Book::inRandomOrder()->limit(6)->get()
        ]);
    }
}
