<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blogs = Blog::all();
    return view('welcome', [
        'blogs' => $blogs
    ]);
});

Route::get('/about', function () {
    $name = "Hlaing min than";
    return view('about', [
        'name' => $name
    ]);
});

// wildcard
Route::get('/blogs/{id}', function ($id) {
    if (!is_numeric($id)) {
        return redirect('/about');
    }
    $blogs = Blog::all(); //refactoring
    return $blogs;
});
