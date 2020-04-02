<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at',
    ];

    public function category()
    {
        // статья пренадлежит категории
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        // статья пренадлежит Пользователю
        return $this->belongsTo(User::class);
    }
}
