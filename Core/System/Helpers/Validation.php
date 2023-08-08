<?php

namespace Core\System;

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

    public function mobile($number) : bool {

        if ($number != null && !preg_match("/^[0-9]{11}$/", strval($number))) {
            return false;
        }
        return true;
    }
}