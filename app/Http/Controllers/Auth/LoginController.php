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

        if (empty($request->name) && empty($request->password)) {
            return redirect()->back()->with('error', 'Formulir tidak boleh kosong! Masukkan Username dan Password.');
        }

        // Cek jika keduanya kosong
        if (empty($request->name) && empty($request->password)) {
            return redirect()->back()->with('error', 'Formulir tidak boleh kosong! Masukkan Username dan Password.');
        }

        // Cek jika hanya username kosong
        if (empty($request->name)) {
            return redirect()->back()->with('error', 'Username tidak boleh kosong!');
        }

        // Cek jika hanya password kosong
        if (empty($request->password)) {
            return redirect()->back()->with('error', 'Password tidak boleh kosong!');
        }

        // $request->validate([
        //     'name' => 'required',
        //     'password' => 'required',
        // ], [
        //     'password.required' => 'Login Gagal! Password Tidak Boleh Kosong',
        //     'name.required' => 'Login Gagal! Username Tidak Boleh Kosong'
        // ]);

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
