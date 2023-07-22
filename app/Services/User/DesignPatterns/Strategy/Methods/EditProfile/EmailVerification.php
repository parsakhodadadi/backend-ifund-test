<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\EditProfile;

use App\Services\User\DesignPatterns\Strategy\Interfaces\EditProfileInterface;

class EmailVerification implements EditProfileInterface
{
    public function editProfile()
    {
        return 'EmailVerification';
    }

    public function getViewName() : string
    {
        return 'email-verification';
    }
}