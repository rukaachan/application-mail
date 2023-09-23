<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = [
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // dd($user->role);

            if ($user->role == 'admin') {
                return redirect('manajemen/user')->with('_token', Session::token());
            } elseif ($user->role == 'operator') {
                return redirect('admin/operator')->with('_token', Session::token());
            }
        }

        return redirect()->back()->withErrors('Terdapat kesalahan Username atau Password')->withInput()->with('_token', Session::token());
    }

    public function logout()
    {
        Auth::logout();
        Session::regenerateToken();
        return redirect('/');
    }
}
