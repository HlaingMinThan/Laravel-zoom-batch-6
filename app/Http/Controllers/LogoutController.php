<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //post
    public function destroy()
    {
        auth()->logout(); // 

        return redirect('/register');
    }
}
