<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Register;

use App\Services\User\DesignPatterns\Strategy\Interfaces\RegisterInterface;

class EmailVerification implements RegisterInterface
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