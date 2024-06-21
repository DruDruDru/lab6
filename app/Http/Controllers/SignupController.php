<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function createUser(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'default'
        ]);

        Auth::login($user);
        return redirect()->route('createTicket');
    }
}
