<?php

namespace App\Request;

use Core\System\Validation;

class PostRequest extends Validation
{
    public function rules()
    {
        return [
            'title' => 'required',
            'short_description' => 'required',
            'text' => 'required',
            'tag' => 'tag_size',
            'files' => 'photo|file_required',
            'post_category_id' => 'required|post_cat_valid',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('posts.title-required'),
            'short_description.required' => __('posts.short_description-required'),
            'text.required' => __('posts.text-required'),
            'tag.tag_size' => __('posts.tag-size'),
            'files.photo' => __('posts.files-photo'),
            'files.file_required' => __('posts.files-required'),
            'post_category_id.required' => __('posts.post_category-required'),
            'post_category_id.post_cat_valid' => __('posts.post_category-valid'),
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