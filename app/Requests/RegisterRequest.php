<?php

namespace App\Request;

use Core\System\Validation;

class RegisterRequest extends Validation
{
    public function rules()
    {
        return [
            'email' => 'email|required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|password',
            'rep-pass' => 'required|password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('register.email-required'),
            'email.email' => __('register.email-email'),
            'first_name.required' => __('register.first_name-required'),
            'last_name.required' => __('register.last_name-required'),
            'password.required' => __('register.password-required'),
            'password.password' => __('register.password-password'),
            'verification.required'=> __('register.code-required'),
            'rep-pass.required' => __('register.rep-pass-required'),
            'rep-pass.password' => __('register.rep-pass-password'),
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
