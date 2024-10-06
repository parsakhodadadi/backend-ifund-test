<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Register;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SignupInterface;

class EmailVerification implements SignupInterface
{
    public function register()
    {
        return 'EmailVerification';
    }

    public function getViewName() : string
    {
        return 'email-verification';
    }
}