<?php

namespace App\Services\User\DesignPatterns\Strategy\Interfaces;

interface EditProfileInterface
{
    public function editProfile();
    public function getViewName();
}