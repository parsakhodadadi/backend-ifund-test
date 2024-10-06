<?php

namespace App\Services\User\DesignPatterns\Strategy\Interfaces;

interface SignupInterface
{
    public function register();
    public function getViewName();
}