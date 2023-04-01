<?php

use App\Models\Book;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage', [
        'books'=>Book::inRandomOrder()->limit(10)->get(),
        'topBooks'=>Book::inRandomOrder()->limit(6)->get()
    ]);
});

Route::get('/catalog', function () {
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
})->name("catalog");



Route::resource('users',UserController::class);