<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Register;

use App\Services\User\DesignPatterns\Strategy\Interfaces\RegisterInterface;

class RegisterForm implements RegisterInterface
{
    public function register()
    {
        return 'RegisterForm';
    }

    public function getViewName() : string
    {
        return 'register-form';
    }

}