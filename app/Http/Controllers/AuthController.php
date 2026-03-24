<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'subdomain' => 'required|string|unique:users,subdomain|alpha_num|lowercase|max:50',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'subdomain' => strtolower($request->subdomain),
        ]);

        return redirect('/')->with('success', 'Account created! Visit ' . $request->subdomain . '.nulinz.co.in');
    }
}