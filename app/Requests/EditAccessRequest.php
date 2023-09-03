<?php

namespace App\Request;

use Core\System\Validation;

class EditAccessRequest extends Validation
{
    public function rules()
    {
        return [
            'user_type' => 'user_type',
            'blocked' => 'blocked',
        ];
    }

    public function messages()
    {
        return [
            'user_type.user_type' => __('users.user_type-invalid'),
            'blocked.blocked' => __('users.blocked-invalid'),
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