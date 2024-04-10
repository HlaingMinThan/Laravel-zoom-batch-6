<?php

namespace App\Models;

class Blog
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'react blog 1',
                'body' => 'react body 1',
            ],
            [
                'id' => 2,
                'title' => 'vue blog 1',
                'body' => 'vue body 1',
            ],
            [
                'id' => 3,
                'title' => 'Laravel blog 1',
                'body' => 'Laravel body 1',
            ],
        ];
    }
}
