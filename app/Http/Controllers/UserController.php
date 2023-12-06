<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function showReg(){
        return view('register/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required', // 1 = Siswa , 2 = Guru
            'mapel' => 'required|string',
            'password' => 'required|string',
        ]);
        if (strlen($request->input('password')) < 8) {
            return redirect()->back()->with('invalidpass', 'Password minimal 8 karakter.');
        }
        try {
            User::where('username', $request->input('username'))->orWhere('email', $request->input('email'))->firstOrFail();
            return redirect()->back()->with('failed', 'Username atau Email sudah digunakan.');
        } catch (ModelNotFoundException $e) {

            $user = new User([
                'username' => $request->input('username'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'mapel' => $request->input('mapel'),
                'password' => bcrypt($request->input('password')),
            ]);
            $user->save();

            return redirect('/login')->with('success', 'Registrasi akun berhasil!');
        }
    }
}