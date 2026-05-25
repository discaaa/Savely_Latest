<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Welcome Back !');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.'
        ])->withInput();
    }

    public function registerStore(Request $request)
{
    $request->validate([
        'username' => 'required|max:50|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'user'
    ]);

    return redirect()->route('login')->with('success', 'Account created successfully! Please Login.');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home')->with('success', 'Logged out successfully.');
    }
}