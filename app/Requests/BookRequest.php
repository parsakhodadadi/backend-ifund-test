<?php

namespace App\Request;

use Core\System\Validation;

class BookRequest extends Validation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|category_valid',
            'sub_category_id' => 'required|sub_category_valid',
            'author_id' => 'required|author_valid',
            'files' => 'photo|file_required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('books.name-required'),
            'description.required' => __('books.description-required'),
            'category_id.required' => __('books.category-required'),
            'category_id.category_valid' => __('books.category-valid'),
            'sub_category_id.required' => __('books.sub_category-required'),
            'sub_category_id.sub_category_valid' => __('books.sub_category-valid'),
            'author_id.required' => __('books.author-required'),
            'author_id.author_valid' => __('books.author-valid'),
            'files.photo' => __('books.files-photo'),
            'files.file_required' => __('books.files-file_required'),
        ];
    }

    public function boot($request)
    {
        $errors = $this->check($this->rules(), $request, $this->messages());

        if (!empty($errors)) {
            return $errors;
        }
    }
}