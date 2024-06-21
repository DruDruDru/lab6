<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('login');
    }

    public function auth(AuthRequest $request)
    {
        $credentials = [
            "name" => $request->name,
            "password" => $request->password
        ];

       if (Auth::attempt($credentials)) {
           return redirect()->route('createTicket');
       } else {
           return redirect()->back()
               ->withErrors(["name" => "Пароль или логин неверен"])->withInput();
       }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showAuthForm');
    }
}
