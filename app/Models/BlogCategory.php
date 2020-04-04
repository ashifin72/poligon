<?php

namespace App\Models;

use App\Observers\BlogCategoryObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 * @property-read BlogCategory $parentCategory
 * @property-read string       $parentTitle
 */

class BlogCategory extends Model
{
    use SoftDeletes;
    const ROOT_ID = 1;
    // добавляем  поля которые fill  может заполнить
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    /**
     * получаем родительскую категорию
     * значения полей 'parent_id' = 'id' в таблице BlogCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * @return mixed|string
     * выводим логику получения parentCategory()->title из вьюхи, если вдруг значение пустое
     */

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'корень'
                : '???');
        return $title;
    }

    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT_ID;
    }
}
