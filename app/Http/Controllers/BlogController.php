<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        //conditional query
        $blogs = Blog::latest();
        if (request('query')) {
            $blogs = $blogs->where('title', 'LIKE', '%' . request('query') . '%');
        }
        return view('blogs.index', [
            'blogs' => $blogs->paginate(5)
        ]);
    }

    public function show(Blog $blog) //Blog::find(2)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }
}
