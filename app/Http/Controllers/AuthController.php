<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function store(Request $request)
    {
        $form = $request->validate([
            'username' => 'required|string|exists:users,username',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($form)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Data tidak sesuai.',
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect(route('auth.index'));
    }
}
