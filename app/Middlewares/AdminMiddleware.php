<?php

namespace App\Middlewares;

use App\Models\Users;
use App\Services\User\LoginAuth;
use Core\System\Helpers\ConfigHelper;

class AdminMiddleware
{
    private $users;

    public function __construct()
    {
        $this->users = loadModel(Users::class);
    }

    public function boot()
    {
        if (isset($_SESSION['USERID'])) {
            if (current($this->users->get(['id' => $_SESSION['USERID']]))->user_type == 'user') {
                redirect('/panel');
            }
        }
    }
}