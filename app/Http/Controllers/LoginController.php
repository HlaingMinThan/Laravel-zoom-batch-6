<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ])) {
            return redirect('/');
        } else {
            return back()->withErrors([
                'email' => 'Wrong credentials'
            ]);
        }
    }
}
