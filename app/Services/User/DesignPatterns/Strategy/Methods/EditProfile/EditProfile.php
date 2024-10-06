<?php

namespace App\Services\User\DesignPatterns\Strategy\Methods\EditProfile;

use App\Services\User\DesignPatterns\Strategy\Interfaces\EditProfileInterface;

class EditProfile implements EditProfileInterface
{
    public function editProfile()
    {
        return 'EditProfile';
    }

    public function getViewName() : string
    {
        return 'edit-profile';
    }
}