<?php

namespace App\Middlewares;

use App\Models\Users;
use App\Services\User\LoginAuth;
use Core\System\Helpers\ConfigHelper;

class UsersMiddleware
{
    private $users;

    public function __construct() {
        $this->configHelper = new ConfigHelper();
        $this->users = loadModel(Users::class);
    }

    public function boot() {
        $userId = $_SESSION['USERID'];
        $user = current($this->users->get(['id' => $userId]));
        if ($user->user_type != 'fulladmin') {
            exit('این دسترسی برای شما وجود ندارد.');
        }
    }
}