<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $appends = [
        'fullName'
    ];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->username;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:Y-m-d',
            'password' => 'hashed',
        ];
    }

    public function isSubscribed($blog)
    {
        return $this->subscribedBlogs
            ->contains('id', $blog->id);
    }

    // a user belongstomany subscribedBlogs
    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_user');
    }

    // a user hasmany blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = fake()->userName();
    }
}
