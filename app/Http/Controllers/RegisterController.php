<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'min:5', "max:10"],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = new User();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        auth()->login($user); //mutator accesor

        return redirect('/');
    }
}
