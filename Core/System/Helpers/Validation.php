<?php

namespace Core\System;

use App\Models\Users;
use Core\System\Helpers\ConfigHelper;

class Validation
{
    private $userId;
    private $users;
    private $currentUser;

    public function __construct()
    {
        if (!empty($_SESSION['USERID'])) {
            $this->userId = $_SESSION['USERID'];
        }
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
    }

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

    public function phone_number($value): bool
    {
        if(!empty($value)) {
            if (!is_numeric($value)) {
                return false;
            }
        }
        return true;
    }

    public function tags_size($value): bool
    {
        if (!empty($value)) {
            if (ConfigHelper::getConfig('default-language') == 'fa') {
                $separator = '،';
            }
            $tagsArray = explode($separator, $value);
            if (count($tagsArray) > 14) {
                return false;
            }
        }
        return true;
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

    public function bookCategoryValid($value)
    {
        if (is_numeric($value)) {
            $category = current(loadModel(BookCategories::class)->get(['id' => $value]));
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

    public function photo_required(array $files): bool
    {
        if (!empty($files['photo']['name'])) {
            return true;
        } else {
            return false;
        }
    }

    public function podcast_required(array $files): bool
    {
        if (!empty($files['podcast']['name'])) {
            return true;
        } else {
            return false;
        }
    }

    public function no_rule($value): bool
    {
        return true;
    }

    public function podcast(array $files): bool
    {
        if ($files['podcast']['tmp_name'] != null) {
//            if (!preg_match('/audio/i', $files['podcast']['type'])) {
//                return false;
//            }
            $nameArray = explode('.', $files['podcast']['name']);
            if (end($nameArray) != 'mp4') {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    public function status_valid($value): bool
    {
        if (empty($value)) {
            return false;
        }
        if ($this->currentUser->user_type == 'fulladmin') {
            if ($value != 'approved' && $value != 'pre-written') {
                return false;
            }
        } else {
            if ($value != 'disapproved' && $value != 'pre-written') {
                return false;
            }
        }
        return true;
    }
}
