<?php

namespace App\Models;

class Blog
{

    public function __construct(public $id, public $title, public $body)
    {
    }


    // many datas -> collection
    public static function all()
    {
        return collect([
            new Blog(1, 'title 1', 'body 1'),
            new Blog(2, 'title 2', 'body 2'),
            new Blog(3, 'title 3', 'body 3'),
        ]);
    }

    // data  -> object
    public static function find($id)
    {
        $blogs = Blog::all();
        return $blogs->firstWhere('id', $id);
    }

    public static function findOrFail($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        return $blog;
    }
}
