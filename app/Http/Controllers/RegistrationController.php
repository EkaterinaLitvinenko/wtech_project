<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        dd($request);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        auth()->login($user);

        return redirect('/homepage');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'podmienky' => ['required', 'accepted'],
            'spracovanie' => ['required', 'accepted'],
        ]);
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