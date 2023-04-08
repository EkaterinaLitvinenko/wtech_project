<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    public function showDelivery(Request $request){
        if(auth()->check()){
            $cart = auth()->user()->cart()->firstOrCreate();
        }
        $cart = $cart->books;
        return view('delivery', ["cart"=> $cart]);
    }


    public function showPayment(Request $request){
        if(auth()->check()){
            $cart = auth()->user()->cart()->firstOrCreate();
        }
        $cart = $cart->books;

        $delivery = session('order_delivery');
        return view('payment', ["cart"=> $cart, "orderDelivery" => $delivery]);
    }

    public function showComplete(Request $request){
        return view('orderComplete');
    }


    public function handle(Request $request){
        $action = $request->input('action');
        switch($action){
            case 'delivery-save':
                $validate = $request->validate([
                    'email'=>['email', 'max:255'],
                    'phone'=> ['regex:/^[\+0]{1}[\d ]{7,}$/u'],
                    'postal-code' => ['max:6', 'regex:/([0-9]){3}(\s)?[0-9]{2}/u']
                ]);
                session(["order_delivery"=> (object)[
                    "first_name" => $request->input('first-name'),
                    "last_name" => $request->input('last-name'),
                    "email" => $request->input('email'),
                    "phone_number" =>  str_replace(' ','',$request->input('phone')),
                    "street" => $request->input('street'),
                    "postal_code" => str_replace(' ','',$request->input('postal-code')),
                    "delivery" => $request->input('delivery-option'),

                ]]);
                return redirect('/order/payment');
            case 'payment-save':
                $cart=  Cart::find(session('cart_id'))->books;
                $delivery = session("order_delivery");
                $payment =  $request->input("payment-option");
                
                $order = Order::create(
                    [
                        'first_name'=>$delivery->first_name,
                        'last_name'=>$delivery->last_name,
                        'email'=>$delivery->email,
                        'phone_number'=>$delivery->phone_number,
                        'payment'=>$payment,
                        'delivery'=>$delivery->delivery,
                        'street'=>$delivery->street,
                        'postal_code'=>$delivery->postal_code
                    ]
                    );
                if(auth()->check()){
                    auth()->user()->orders()->save($order);
                }
                foreach($cart as $book){
                    $order->books()->attach($book,['quantity'=>$book->pivot->quantity]);
                }
                return redirect('/order/{id}/completed');
        }
    }
}
