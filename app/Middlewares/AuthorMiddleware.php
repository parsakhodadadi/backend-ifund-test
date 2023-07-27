<?php

namespace App\Middlewares;

use App\Model\Authors;
use App\Models\Users;

class AuthorMiddleware
{
    private $userId;
    private $users;
    private $currentUser;

    public function __construct()
    {
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
    }

    public function boot(array $userTypes)
    {
        foreach ($userTypes as $userType) {
            if ($this->currentUser->user_type == $userType) {
                redirect('/Authors');
            }
        }
    }
}