<?php

namespace App\Services\User\DesignPatterns\Strategy\Interfaces;

interface SigninInerface
{
    public function login();
    public function getViewName();
}