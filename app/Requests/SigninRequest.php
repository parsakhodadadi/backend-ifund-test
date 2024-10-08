<?php

namespace App\Request;

use Core\System\Validation;

class SigninRequest extends Validation
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('sign-in.email-required'),
            'email.email' => __('sign-in.email-email'),
            'password.required' => __('sign-in.password-required'),
            'password.password' => __('sign-in.password-password'),
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
