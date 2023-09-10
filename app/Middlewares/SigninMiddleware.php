<?php

namespace App\Middlewares;

use App\Services\User\SigninAuth;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class SigninMiddleware extends controller
{
    private $authService;

    public function __construct()
    {
        $this->authService = SigninAuth::getInstance(ConfigHelper::getConfig('login-method'));
    }

    public function boot()
    {
        if (!$this->authService->getUserId()) {
            redirect('/sign-in');
        }
    }
}
