<?php

namespace App\Request;

use Core\System\Validation;

class PodcastRequest extends Validation
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'files' => 'podcast|file_required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('podcasts.title-required'),
            'description.required' => __('podcasts.description-required'),
            'files.podcast' => __('podcasts.files-photo'),
            'files.required' => __('podcasts.files-required'),
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