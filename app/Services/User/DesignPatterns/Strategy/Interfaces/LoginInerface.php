<?php

namespace App\Services\User\DesignPatterns\Strategy\Interfaces;

interface LoginInerface
{
    public function login();
    public function getViewName();
}