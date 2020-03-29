<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    protected $model;//

    public function __construct()
    {
        $this->model = app($this->getModelClass());
//        $this->model = new $this->getModelClass();
    }
    //  нашу мщдель назначет потомок
    abstract protected function getModelClass();

    // клонируем модель при старте

    protected  function startConditions()
    {
        return clone $this->model;
    }
}
