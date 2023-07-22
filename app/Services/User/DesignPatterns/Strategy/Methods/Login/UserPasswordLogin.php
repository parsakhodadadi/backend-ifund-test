<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Login;

use App\Services\User\DesignPatterns\Strategy\Interfaces\LoginInerface;

class UserPasswordLogin implements LoginInerface
{
    public function login()
    {
        echo 'UserPasswordLogin';
    }

    public function getViewName(): string
    {
        return 'user-password-login';
    }
}
