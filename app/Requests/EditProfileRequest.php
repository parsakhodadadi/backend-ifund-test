<?php

namespace App\Request;

use Core\System\Validation;

class EditProfileRequest extends Validation
{
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('users.email-required'),
            'email.email' => __('users.email-email'),
            'first_name.required' => __('users.first_name-required'),
            'last_name.required' => __('users.last_name-required'),
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