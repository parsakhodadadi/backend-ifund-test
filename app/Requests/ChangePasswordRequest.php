<?php

namespace App\Request;

use Core\System\Validation;

class ChangePasswordRequest extends Validation
{
    public function rules()
    {
        return [
            'password' => 'required|password',
            'new-pass' => 'required|password',
            'rep-new-pass' => 'required|password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('users.password-required'),
            'password.password' => __('users.password-password'),
            'new-pass.required' => __('users.new-pass-required'),
            'new-pass.password' => __('users.new-pass-password'),
            'rep-new-pass.required' => __('users.rep-new-pass-required'),
            'rep-new-pass.password' => __('users.rep-new-pass-password'),
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