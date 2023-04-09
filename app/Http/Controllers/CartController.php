<?php

namespace App\Http\Controllers;

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

    public function update(Request $request,int $c_id, int $id,int $value){
        Cart::find($c_id)->books()->find($id)->pivot->update(["quantity"=>$value]);
        return ['ok'];
    }

    private function delete(Request $request,int $c_id, int $id){
        Cart::find($c_id)->books->detach($id);
        return ['ok'];
    }
    public function show(Request $request){
        $cart =  CartController::getCart()->books;

        return view('cart', ["cart"=> $cart]);
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
                'quantity'=>$amount+$prevAmount
            ]);
        }else{
            $cart->books()->attach(Book::find($bookId),['quantity'=>$amount]);
        }

        return redirect()->back();
    }
}
