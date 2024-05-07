<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'body'];

    // A Blog belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //filter ->scopeFilter
    //query scope
    public static function scopeFilter($query, $filters)
    {

        if (isset($filters['query']) and $filters['query']) {
            $query
                ->where(function ($query)  use ($filters) {
                    $query->where('title', 'LIKE', '%' . $filters['query'] . '%')
                        ->orWhere('body', 'LIKE', '%' . $filters['query'] . '%');
                });
        }

        if (isset($filters['category_id']) and $filters['category_id']) {
            $query->whereHas('category', function ($query) use ($filters) {
                $query->where('id', $filters['category_id']);
            });
        }

        if (isset($filters['user_id']) and $filters['user_id']) {
            $query->whereHas('user', function ($query) use ($filters) {
                $query->where('id', $filters['user_id']);
            });
        }
    }

    // a blog belongsto a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
