<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request): RedirectResponse
    {

        $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'string', 'min:8'],
        'terms' => ['required', 'accepted'],
        'consent' => ['required', 'accepted'],
        ],
        [ 'password.min' => 'Heslo musí mať aspoň 8 znakov',]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => $request->password,
        ]);

        Auth::login($user);
        Log::info(Auth::user()->id);

        if(session()->has('cart_id')){
            $cart = Cart::find(session('cart_id'));
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

        return redirect()->intended('/');
    }

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first-name'],
            'last_name' => $data['last-name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
