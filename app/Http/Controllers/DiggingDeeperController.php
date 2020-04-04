<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    /**
     *
     */
    public function collections()
    {
        $result = [];
        /**
         * Получаем все данные вместе с удалеными
         *
         */
        $elequentCollection = BlogPost::withTrashed()-> get();
//        dd(__METHOD__, $elequentCollection, $elequentCollection->toArray());
        $collections = collect($elequentCollection->toArray());
        dd(
            get_class($elequentCollection),
            get_class($collections),
            $collections
        );

    }
}
