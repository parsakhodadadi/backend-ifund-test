<?php

namespace Core\System;

use App\Model\Authors;
use App\Models\Categories;
use App\Models\Subcategories;

class Validation {

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

    public function sub_category_valid($value)
    {
        if (is_numeric($value)) {
            $sub_category = current(loadModel(Subcategories::class)->get(['id' => $value]));
            if (!empty($sub_category)) {
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

    public function min($value)
    {
        echo $value;
    }

    public function max($value) : bool
    {
        if (strlen($value) >= 8) {
            return true;
        } else {
            return false;
        }
    }

    public function email(string $value) : bool
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function password(string $value) : bool
    {
        if (strlen($value) >= 8) {
            return true;
        }
        return false;
    }

    public function photo(array $files) : bool
    {
        if (!empty($files['photo']['name'])) {
            return (bool)getimagesize($files['photo']['tmp_name']);
        }
        return true;
    }

    public function mobile($number) : bool
    {

        if ($number != null && !preg_match("/^[0-9]{11}$/", strval($number))) {
            return false;
        }
        return true;
    }

    public function file_required(array $files): bool
    {
        if (!empty($files['photo']['tmp_name'])) {
            return true;
        } else {
            return false;
        }
    }
}