<?php

namespace App\Request;

use Core\System\Validation;

class SignupRequest extends Validation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|password',
            'confirm-password' => 'required|password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('sign-up.name-required'),
            'email.required' => __('sign-up.email-required'),
            'email.email' => __('sign-up.email-email'),
            'password.required' => __('sign-up.password-required'),
            'password.password' => __('sign-up.password-password'),
            'confirm-password.required' => __('sign-up.confirm-password-required'),
            'confirm-password.password' => __('sign-up.confirm-password-password'),
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
