<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = 'Login';

        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            if (Auth::user()->user_status != 'active') {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun anda di non aktifkan');
            }
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'Username / Password Salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}