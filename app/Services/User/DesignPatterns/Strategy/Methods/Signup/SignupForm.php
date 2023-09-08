<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\Signup;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SignupInterface;

class SignupForm implements SignupInterface
{
    public function register()
    {
        return 'SignupForm';
    }

    public function getViewName() : string
    {
        return 'sign-up-form';
    }

}