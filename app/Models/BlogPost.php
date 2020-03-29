<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

//    protected $dates =[
//        'published_at',
//
//    ];

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
