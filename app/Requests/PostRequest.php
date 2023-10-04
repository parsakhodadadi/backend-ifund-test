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
            'tags' => 'tags_size',
            'files' => 'photo|photo_required',
            'post_category_id' => 'required|post_cat_valid',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('posts.title-required'),
            'short_description.required' => __('posts.short_description-required'),
            'text.required' => __('posts.text-required'),
            'tags.tags_size' => __('posts.tags-size'),
            'files.photo' => __('posts.photo-photo'),
            'files.photo_required' => __('posts.photo-required'),
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