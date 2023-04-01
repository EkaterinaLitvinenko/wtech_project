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
    return view('catalog', [
        //'books'=>Book::inRandomOrder()->limit(6)->get()
        'books'=>Book::paginate(6)
    ]);
});


Route::resource('users',UserController::class);