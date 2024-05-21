<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'blogs' => Blog::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back();
    }
}
