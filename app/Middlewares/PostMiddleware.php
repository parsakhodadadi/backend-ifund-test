<?php

namespace App\Middlewares;

use App\Models\Posts;
use App\Models\Users;

class PostMiddleware
{
    private $users;
    private $userId;
    private $currentUser;

    public function __construct()
    {
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
    }

    public function boot() {
        if ($this->currentUser->user_type == 'user') {
            redirect('/posts');
        }
    }

}