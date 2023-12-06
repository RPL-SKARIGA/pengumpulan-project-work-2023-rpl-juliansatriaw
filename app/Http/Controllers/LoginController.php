<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            // Autentikasi gagal
            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                // Jika akun tidak ditemukan
                return redirect()->back()->with('notexist', 'Email belum diregister.');
            } else {
                // Jika password salah
                return redirect()->back()->with('error', 'Email / Password Salah.');
            }
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}