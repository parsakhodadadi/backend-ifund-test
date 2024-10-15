<?php

namespace App\Request;

use Core\System\Validation;

class EditProfileRequest extends Validation
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|required',
            'phone' => 'phone_number',
            'skills' => 'no_rule',
            'experience' => 'no_rule',
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
            'phone.phone_number' => __('edit-profile.phone-number'),
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
