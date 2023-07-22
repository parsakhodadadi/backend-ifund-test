<?php

namespace App\Request;

use Core\System\Validation;

class CategoryRequest extends Validation
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'عنوان را پر کنید',
            'description.required' => 'توضیحات را پر کنید',
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
