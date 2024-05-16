<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function toggle(Blog $blog)
    {
        if (auth()->user()->isSubscribed($blog)) {
            $blog->users()->detach(auth()->id());
        } else {
            $blog->users()->attach(auth()->id());
        }
        return back();
    }
}
