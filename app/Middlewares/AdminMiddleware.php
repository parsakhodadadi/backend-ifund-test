<?php

namespace App\Middlewares;

use App\Models\Users;
use App\Services\User\SigninAuth;
use Core\System\Helpers\ConfigHelper;

class AdminMiddleware
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
            if (current($this->users->get(['id' => $_SESSION['USERID']]))->user_type == 'user') {
                exit('<b>You do not have access to this module</b>');
            }
        }
    }
}