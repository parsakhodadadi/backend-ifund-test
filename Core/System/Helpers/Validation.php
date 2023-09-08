<?php

namespace Core\System;

use App\Model\Authors;
use App\Models\Categories;
use App\Models\PostCategories;
use App\Models\Subjects;

class Validation
{
    public function check($rules = [], $request = [], $messages = [])
    {
        $errors = [];
        if (!empty($rules) && !empty($request)) {
            foreach ($rules as $element => $rule) {
                $elementRules = explode('|', $rule);
                foreach ($elementRules as $elementRule) {
                    $filterStatus = $this->$elementRule($request[$element]);
                    if (!$filterStatus) {
                        $errors[$element][$elementRule] = $messages["$element.$elementRule"];
                    }
                }
            }
            return $errors;
        }
    }

    public function required($value)
    {
        if (!empty($value)) {
            return true;
        } else {
            return false;
        }
    }

    public function user_type($value)
    {
        if ($value != 'user' && $value != 'admin') {
            return false;
        }
        return true;
    }

    public function blocked($value)
    {
        if ($value != 'yes' && $value != 'no') {
            return false;
        }
        return true;
    }

    public function category_valid($value)
    {
        if (is_numeric($value)) {
            $category = current(loadModel(Categories::class)->get(['id' => $value]));
            if (!empty($category)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function subject_valid($value)
    {
        if (is_numeric($value)) {
            $subject = current(loadModel(Subjects::class)->get(['id' => $value]));
            if (!empty($subject)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function author_valid($value)
    {
        if (is_numeric($value)) {
            $author = current(loadModel(Authors::class)->get(['id' => $value]));
            if (!empty($author)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function post_cat_valid($value)
    {
        if (is_numeric($value)) {
            $post_cat = current(loadModel(PostCategories::class)->get(['id' => $value]));
            if (!empty($post_cat)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function min($value)
    {
        echo $value;
    }

    public function max($value): bool
    {
        if (strlen($value) >= 8) {
            return true;
        } else {
            return false;
        }
    }

    public function email(string $value): bool
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function password(string $value): bool
    {
        if (strlen($value) >= 8) {
            return true;
        }
        return false;
    }

    public function photo(array $files): bool
    {
        if (!empty($files['photo']['tmp_name'])) {
            return (bool)getimagesize($files['photo']['tmp_name']);
        }
        return true;
    }

    public function mobile($number): bool
    {

        if ($number != null && !preg_match("/^[0-9]{11}$/", strval($number))) {
            return false;
        }
        return true;
    }

    public function file_required(array $files): bool
    {
        if (!empty($files['photo']['name'])) {
            return true;
        } else {
            return false;
        }
    }
}
