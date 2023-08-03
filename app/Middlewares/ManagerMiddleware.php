<?php

namespace App\Middlewares;

use App\Models\Users;

class ManagerMiddleware
{
    private $users;

    public function __construct()
    {
        $this->users = loadModel(Users::class);
    }

    public function boot()
    {
        if (isset($_SESSION['USERID'])) {
            if (current($this->users->get(['id' => $_SESSION['USERID']]))->user_type != 'fulladmin') {
//                exit(current($this->users->get(['id' => $_SESSION['USERID']]))->user_type);
                redirect('/panel');
            }
        }
    }
}