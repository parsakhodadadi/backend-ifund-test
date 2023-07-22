<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Login;

use App\Services\User\DesignPatterns\Strategy\Interfaces\LoginInerface;

class OtpLogin implements LoginInerface
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