<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('welcome', [
            'blogs' => $blogs
        ]);
    }

    public function show(Blog $blog) //Blog::find(2)
    {
        return view('blog-detail', [
            'blog' => $blog
        ]);
    }
}
