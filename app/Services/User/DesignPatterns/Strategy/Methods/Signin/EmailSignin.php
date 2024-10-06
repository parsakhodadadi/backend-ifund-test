<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Signin;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SigninInerface;

class EmailSignin implements SigninInerface
{
    public function login()
    {
        echo 'EmailLogin';
    }

    public function getViewName(): string
    {
        return 'email-login';
    }
}
