<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class BlogCategoryRepository.
 */
class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    // получить модель для редактирования в админке
    public function getEdit($id)
    {

        // клонируем модельку и получаем данные по id
        return $this->startConditions()->find($id);
    }

    /**
     * получаем котегории для вывода в списке
     */
    public function getForComboBox()
    {
        // клонируем модельку и получаем все поля
//        return $this->startConditions()->all();
//        //  получаем только нужные поля
        $columns = implode(',', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);
//        $result[] = $this->startConditions()->all();
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();
//        dd($result->first());

        return $result;

    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];
        $result = $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);
        return $result;
    }


}
