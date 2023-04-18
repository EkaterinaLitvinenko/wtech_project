<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function check(LoginRequest $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', function ($attribute, $value, $fail) use ($request) {
                if (!Auth::attempt(['email' => $request->email, 'password' => $value])) {
                    return $fail(__('Heslo je nesprávne'));
                }
            }],
        ]);

        $credentials = $request->only('email', 'password');

        $request->session()->forget('cart_id');
        $request->authenticate();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        Log::info('LoginController@logout');
        Auth::guard('web')->logout();

        $request->session()->forget('cart_id');
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
