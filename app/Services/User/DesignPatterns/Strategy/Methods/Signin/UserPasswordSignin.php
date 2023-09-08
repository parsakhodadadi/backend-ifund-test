<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Signin;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SigninInerface;

class UserPasswordSignin implements SigninInerface
{
    public function login()
    {
        echo 'UserPasswordSignin';
    }

    public function getViewName(): string
    {
        return 'user-password-sign-in';
    }
}
