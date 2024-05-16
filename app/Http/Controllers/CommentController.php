<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required'
        ]);
        $blog->comments()->create([
            'user_id' => auth()->id(),
            'body' =>  request('body')
        ]);

        // send email -> $blogs's subscribers
        return back();
    }
}
