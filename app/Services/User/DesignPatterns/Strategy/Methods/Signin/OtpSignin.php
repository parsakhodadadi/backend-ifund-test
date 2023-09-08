<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Signin;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SigninInerface;

class OtpSignin implements SigninInerface
{
    public function login()
    {
        echo 'OtpLogin';
    }

    public function getViewName(): string
    {
        return 'otp-login';
    }
}