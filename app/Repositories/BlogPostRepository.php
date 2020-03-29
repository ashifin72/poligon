<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;


//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * выводим список  постов с пагинацией
     */

    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id',
        ];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['category:id,title', 'user:id,name'])// жадная загрузка
            ->paginate(25);


        return $result;
    }

    /**
     * получаем модель для редактирования в админке по id
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
    /**
     *
     */

}
