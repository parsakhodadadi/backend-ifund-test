<?php

namespace App\Request;

use Core\System\Validation;

class PostRequest extends Validation
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'files' => 'photo',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('posts.title-required'),
            'description.required' => __('posts.description-required'),
            'files.photo' => __('posts.files-photo')
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