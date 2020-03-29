<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:200',
<<<<<<< HEAD
            'slug' => 'max:200|unique:blog_categories,slug',
=======
            'slug '=> 'max:200',
>>>>>>> 98b5a9a... create
            'description' => 'string|max:500|min:3',
            'parent_id'=> 'required|integer|exists:blog_categories,id',
        ];
    }
}
