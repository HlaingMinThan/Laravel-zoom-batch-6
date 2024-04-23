<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('welcome', [
            'blogs' => $blogs
        ]);
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }
        $blog = Blog::findOrFail($id);
        return view('blog-detail', [
            'blog' => $blog
        ]);
    }
}
