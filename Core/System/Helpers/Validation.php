<?php

namespace Core\System;

class Validation {

    public function check($rules = [], $request = [], $messages = [])
    {
        $errors = [];
        if (!empty($rules)) {
            foreach ($request as $element => $rule) {
                $elementRules = explode('|', $rule);
                foreach ($elementRules as $elementRule) {
                    $filterStatus = $this->elementRule($request[$element]);
                    if (!$filterStatus) {
                        $errors[$element][$elementRule] = $messages["$element.$elementRule"];
                    }
                }

            }
            return $errors;
        }

//        $errors = [];
//        foreach ($request as $element => $value) {
//            $allRules = explode('|', $value);
//            foreach ($allRules as $rule) {
//                if (!$this->$rule($value)) {
//                    $errors[$element][$rule] = $messages[$element.".".$rule];
//                }
//            }
//        }
//        return $errors;
    }

    public function required($value)
    {
        if (!empty($value)) {
            return true;
        } else {
            return false;
        }
    }

    public function min($value) {
        echo $value;
    }

    public function max($value) {
        if (strlen($value) >= 8) {
            return true;
        } else {
            return false;
        }
    }

//    public function email(string $value) : bool
//    {
//        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
//            return true;
//        }
//        return false;
//    }
}