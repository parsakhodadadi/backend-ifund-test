<?php

namespace App\Request;

use Core\System\Validation;

class AuthorRequest extends Validation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'about' => 'required',
            'files' => 'photo'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('authors.name-required'),
            'about.required' => __('authors.about-required'),
            'files.photo' => __('authors.files-photo')
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