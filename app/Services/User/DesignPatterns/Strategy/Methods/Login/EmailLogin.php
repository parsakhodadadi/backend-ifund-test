<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Login;

use App\Services\User\DesignPatterns\Strategy\Interfaces\LoginInerface;

class EmailLogin implements LoginInerface
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
