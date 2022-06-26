<?php

class Security {
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function attempt($attempt = 3) {
        $_SESSION['attempt'] += 1;
        if ($_SESSION['attempt'] >= 3)
            return true;
        return false;
    }

    public function csrfToken() {
        return $_SESSION[$_SERVER['REMOTE_ADDR']]['csrf_token'] = md5(random_bytes(64).time());
    }

    public function checkCSRFToken($value) {
        if ($_SESSION[$_SERVER['REMOTE_ADDR']]['csrf_token'] != $value)
            return false;
        return true;
    }
}