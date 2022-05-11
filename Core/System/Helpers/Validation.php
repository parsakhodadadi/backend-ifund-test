<?php

namespace Core\System;

use http\Header\Parser;

class Validation {

    public function rules($rules = [], $request = [], $messages = [])
    {
        $errors = [];
        foreach ($request as $element=>$value) {
            $allRules = explode('|', $rules[$element]);
            foreach ($allRules as $rule) {
                if (!$this->$rule($value)) {
                    $errors[$element][$rule] = $messages[$element.".".$rule];
                }
            }
        }
        return $errors;
    }

    public function isNumeric($value) : bool
    {
        if (is_numeric($value)) return true; else return false;
    }

    public function required($value)
    {
        if (!empty($value)) return true; else return false;
    }

    public function email(string $value) : bool
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}