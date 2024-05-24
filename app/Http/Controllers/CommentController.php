<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'body' => 'required'
        ]);
        $comment = $blog->comments()->create([
            'user_id' => auth()->id(),
            'body' =>  request('body')
        ]);

        // send email -> $blogs's subscribers
        $subscribers = $blog->users->filter(function ($user) {
            return $user->id !== auth()->id();
        });

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($subscriber, $comment));
        }
        return back();
    }

    public function destroy(Comment $comment)
    {
        if (!auth()->user()->can('delete', $comment)) {
            abort(403);
        }

        $comment->delete();

        return back();
    }
}
