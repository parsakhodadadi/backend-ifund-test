<?php

namespace App\Middlewares;

use App\Services\User\LoginAuth;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class LoginMiddleware extends controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = LoginAuth::getInstance(ConfigHelper::getConfig('login-method'));
    }

    public function boot()
    {
        if (!$this->authService->getUserId()) {
            redirect('/login');
        }
    }
}
