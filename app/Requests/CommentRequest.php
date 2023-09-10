<?php

namespace App\Request;

use Core\System\Validation;

class CommentRequest extends Validation
{
    public function rules()
    {
        return [
            'text' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => __('comments.text-required'),
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