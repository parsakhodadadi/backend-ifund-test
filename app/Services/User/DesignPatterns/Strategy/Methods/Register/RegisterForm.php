<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods;

use App\Services\User\DesignPatterns\Strategy\Interfaces\RegisterInterface;

class RegisterForm implements RegisterInterface
{
    public function register()
    {
        return 'RegisterForm';
    }

    public function getViewName()
    {
        return 'register-form';
    }

}