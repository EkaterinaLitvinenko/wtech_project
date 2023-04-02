<?php

use App\Http\Controllers\CartController;
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
        'books'=>Book::paginate(10),
        'topBooks'=>Book::inRandomOrder()->limit(6)->get()
    ]);
});


Route::get('/cart',[CartController::class,'show']);
Route::post('/cart/handle',[CartController::class,'handle']);


Route::resource('users',UserController::class);