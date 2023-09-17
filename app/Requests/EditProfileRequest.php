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
            'username' => 'required',
            'files' => 'photo',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => __('profile.first_name-required'),
            'last_name.required' => __('profile.last_name-required'),
            'email.email' => __('profile.email-email'),
            'email.required' => __('profile.email-required'),
            'files.photo' => __('profile.files-photo'),
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