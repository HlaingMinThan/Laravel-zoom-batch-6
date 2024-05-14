<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'blog_id',
        'body',
    ];

    // a comment belongsto a blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // a comment belongsto a author
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
