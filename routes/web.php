<?php

use App\Http\Controllers\CartController;
use App\Models\Book;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\OrderController;




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

Route::get('/', [HomepageController::class, 'index'] );

Route::get('/katalog', [CatalogController::class, 'index'])->name("catalog");
Route::post("/katalog", [CatalogController::class, 'store']);


Route::get('/cart', [CartController::class,'show']);
Route::post('/cart/handle',[CartController::class,'handle']);


Route::resource('users',UserController::class);
Route::get("/kniha/{id}", [CatalogController::class, 'show']);


Route::get('/order/delivery',[OrderController::class,'showDelivery']);
Route::get('/order/payment',[OrderController::class,'showPayment']);
Route::get('/order/{id}/completed',[OrderController::class,'showComplete']);

Route::post('/order/handle',[OrderController::class,'handle']);
