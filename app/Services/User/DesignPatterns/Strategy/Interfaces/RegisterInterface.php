<?php

namespace App\Services\User\DesignPatterns\Strategy\Interfaces;

interface RegisterInterface
{
    public function register();
    public function getViewName();
}