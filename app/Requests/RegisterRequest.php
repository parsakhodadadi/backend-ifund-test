<?php

namespace App\Request;

use Core\System\Validation;

class RegisterRequest extends Validation {

    public function rules()
    {
        return [
            'email' => 'email|required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|password',
            'country' => 'required'
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
            'country.required' => __('register.country-required')
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