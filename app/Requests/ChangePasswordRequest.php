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
            'password.required' => __('change-password.password-required'),
            'password.password' => __('change-password.password-password'),
            'new-pass.required' => __('change-password.new-pass-required'),
            'new-pass.password' => __('change-password.new-pass-password'),
            'rep-new-pass.required' => __('change-password.rep-new-pass-required'),
            'rep-new-pass.password' => __('change-password.rep-new-pass-password'),
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