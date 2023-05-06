<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\CartController;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

     public function adminIndex()
    {
        return view('admin.login');
    }

    public function check(LoginRequest $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', function ($attribute, $value, $fail) {
                if (!User::where('email', $value)->exists()) {
                    return $fail(__('E-mail nie je zaregistrovaný'));
                }
            }],

            'password' => ['required', 'string', function ($attribute, $value, $fail) use ($request) {
                if (!Auth::attempt(['email' => $request->email, 'password' => $value], true)) {
                    return $fail(__('Heslo je nesprávne'));
                }
            },],
        ]);

        $credentials = $request->only('email', 'password');
        $request->authenticate();

        if ($request->session()->has('cart_id')) {
            $cart_id = $request->session()->get('cart_id');
            $cart = Cart::find($cart_id);
        } else {
            $cart = new Cart();
            $cart->save();
            $cart_id = $cart->id;
            $request->session()->put('cart_id', $cart_id);
        }

        //$request->session()->forget('cart_id');
        CartController::mergeCarts(auth()->user());

        $request->session()->regenerate();

        return redirect('/');
    }

    public function adminCheck(Request $request)
    {

         $request->validate([
            'email' => ['required', 'string', 'email', function ($attribute, $value, $fail) {
                if (!User::where('email', $value)->exists()) {
                    return $fail(__('E-mail je nesprávny'));
                }
            }],

            'password' => ['required', 'string', function ($attribute, $value, $fail) use ($request) {
                if (!Auth::attempt(['email' => $request->email, 'password' => $value], true)) {
                    return $fail(__('Heslo je nesprávne'));
                }
            },],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/list');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Nemáte oprávnenie prihlásiť sa do administrátorského rozhrania.']);
            }
        }
    }


    public function logout(Request $request)
    {
        Log::info('LoginController@logout');
        $role = Auth::user()->role;
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($role == 'admin') {
            return redirect('admin/login');
        } else if ($role == 'user'){
            $request->session()->forget('cart_id');
            return redirect('/');
        }
    }

}
