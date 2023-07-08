<?php

namespace App\Middlewares;

use App\Services\User\LoginAuth;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class LoginMiddleware extends controller
{
    private object $authService;
    private $configHelper;
    public function __construct()
    {
        $configHelper = new ConfigHelper();
        $this->authService = LoginAuth::getInstance($configHelper::getConfig('login-method'));
    }

    public function boot()
    {
        if (!$this->authService->getUserId()) {
            redirect('/login');
        }
    }
}
