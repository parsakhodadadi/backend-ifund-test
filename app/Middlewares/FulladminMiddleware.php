<?php

namespace App\Middlewares;

use App\Models\Users;

class FulladminMiddleware
{
    private $users;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->users = loadModel(Users::class);
    }

    public function boot()
    {
        if (isset($_SESSION['USERID'])) {
            if (current($this->users->get(['id' => $_SESSION['USERID']]))->user_type != 'fulladmin') {
                exit('<b>You do not have access to this module</b>');
            }
        }
    }
}