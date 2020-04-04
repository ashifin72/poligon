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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * статья пренадлежит категории
     * названия полей в БД едентичны
     */

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * статья пренадлежит Пользователю
     * названия полей в БД едентичны
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
