<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Cart;

class CartController extends Controller
{

    public static function getCart(){
        if(session()->has('cart_id')){
            return Cart::find(session('cart_id'));
        }

        if(auth()->check()){
            $cart = auth()->user()->cart()->firstOrCreate();
        }
        else{
            $cart = Cart::create();
        }
        session(['cart_id'=> $cart->id]);

        return $cart;
    }

    public static function mergeCarts($user){
        $cart = Cart::find(session('cart_id'));
        $user_cart = $user->cart()->firstOrCreate();
        foreach ($cart->books as $book){
            if($user_cart->books()->where('book_id',$book->id)->exists()){
                $prevAmount= $user_cart->books()->find($book->id)->pivot->quantity;
                $user_cart->books()->updateExistingPivot($book->id,[
                    'quantity'=>$book->pivot->quantity+$prevAmount,
                    'updated_at'=>Carbon::now("Europe/Budapest")->toDateTimeString(),
                ]);

                $book->pivot->delete();
            }else{
                $book->pivot->update(['cart_id'=>$user_cart->id,'updated_at'=>Carbon::now("Europe/Budapest")->toDateTimeString()]);
            }
        }
        $user_cart->books()->syncWithoutDetaching($cart->books);
        $cart->delete();
        session(['cart_id'=> $user_cart->id]);
    }

    public function update(Request $request,int $id,int $value){
        Cart::find(session('cart_id'))->books()->find($id)->pivot->update(["quantity"=>$value,'updated_at'=>Carbon::now("Europe/Budapest")->toDateTimeString()]);
        return ['success'=>true];
    }

    public function show(Request $request){
        $cart =  CartController::getCart()->books->sortBy('title');
        $cart_books = [];

        foreach($cart as $book){
            $image = config('constants.IMAGE_DIR') . $book->photos->first()->filename;
            $author_str = '';
            foreach ($book->authors as $author) {
                $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
            }
            $author_str=rtrim($author_str,', ');

            array_push($cart_books, (object)[
                "book" => $book,
                "authors" => $author_str,
                "image" => $image,
            ]);
        }
        return view('cart', ["cart"=> $cart_books]);
    }

    public function handle(Request $request){
        $action = explode(',',$request->input('action'));
        switch($action[0]){
            case 'delete':
                Cart::find(session('cart_id'))->books()->detach($action[1]);
                return redirect('/cart');
            case 'save':
                return redirect('/order/delivery');
        }
    }


    public function addProduct(Request $request){
        $cart = CartController::getCart();
        $amount = $request->input('amount');
        $bookId = $request->input('book_id');
        if($cart->books()->where('book_id',$bookId)->exists()){
            $prevAmount= $cart->books()->find($bookId)->pivot->quantity;
            $cart->books()->updateExistingPivot($bookId,[
                'quantity'=>$amount+$prevAmount,
                'updated_at'=>Carbon::now("Europe/Budapest")->toDateTimeString()
            ]);
        }else{
            $cart->books()->attach(Book::find($bookId),['quantity'=>$amount]);
        }

        return redirect()->back();
    }
}
