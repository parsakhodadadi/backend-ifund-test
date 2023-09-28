<?php

namespace App\Request;

use Core\System\Validation;

class PodcastRequest extends Validation
{
    public function rules()
    {
        return [
            'title' => 'required',
            'short_description' => 'required',
            'text' => 'no_rule',
            'files' => 'podcast|podcast_required|photo|photo_required',
            'tag' => 'tag_size',
            'status' => 'status_valid',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('podcasts.title-required'),
            'short_description.required' => __('podcasts.description-required'),
            'files.podcast' => __('podcasts.podcast-podcast'),
            'files.podcast_required' => __('podcasts.podcast-required'),
            'files.photo' => __('podcasts.photo-photo'),
            'files.photo_required' => __('podcasts.photo-required'),
            'tag.tag_size' => __('podcasts.tag_size'),
            'status.status_valid' => __('podcasts.status_valid'),
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