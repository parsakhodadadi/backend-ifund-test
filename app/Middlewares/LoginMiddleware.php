<?php

namespace App\Middlewares;

use App\Services\User\Auth;
use Core\System\controller;

class LoginMiddleware extends controller
{
    private object $authService;
    public function __construct()
    {
        $this->authService = Auth::getInstance();
    }

    public function boot()
    {
        if ($this->authService->getUserId()) {
            redirect('/login');
        }
    }
}
