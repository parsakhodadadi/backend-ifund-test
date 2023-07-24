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
            'photo' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.title-required'),
            'description.required' => __('validation.description-required'),
//            'photo.size' => __('validation.photo-url')
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