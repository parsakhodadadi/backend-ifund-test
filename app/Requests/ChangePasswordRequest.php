<?php

namespace App\Request;

use Core\System\Validation;

class ChangePasswordRequest extends Validation
{
    public function rules()
    {
        return [
            'current-password' => 'required|password',
            'new-password' => 'required|password',
            'confirm-password' => 'required|password',
        ];
    }

    public function messages()
    {
        return [
            'current-password.required' => __('profile.password-required'),
            'current-password.password' => __('profile.password-password'),
            'new-password.required' => __('profile.new-password-required'),
            'new-password.password' => __('profile.new-password-password'),
            'confirm-password.required' => __('profile.confirm-password-required'),
            'confirm-password.password' => __('profile.confirm-password-password'),
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