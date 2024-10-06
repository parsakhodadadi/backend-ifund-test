<?php

namespace App\Controllers;

use App\Middlewares\AdminMiddleware;
use App\Models\Users;
use App\Services\User\EditProfileService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class UserController extends controller
{
    private $blade;
    private $lang;
    private $users;
    private $currentUser;
    private $request;
    private $editProfileService;
    private $posts;

    public function __construct()
    {
        $this->request = request();
        $this->blade = blade();
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'users');
        $this->posts = loadModel(Posts::class);
    }

    public function management()
    {
        $users = $this->users->get();
        echo $this->blade->render('backend/main/layout/users/management', [
            'users' => $users,
            'lang' => $this->lang,
            'currentUser' => $this->currentUser,
            'view' => $this->blade,
            'posts' => $this->posts,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function userSingle(int $itemId)
    {
        $user = current($this->users->get(['id' => $itemId]));
        echo $this->blade->render('backend/main/layout/users/user-single', [
            'view' => $this->blade,
            'lang' => $this->lang,
            'user' => $user,
            'posts' => $this->posts,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function changeAccess(int $itemId)
    {
        if (current($this->users->get(['id' => $itemId]))->user_type == 'user') {
            $errorMessage = $this->users->update(['id' => $itemId], ['user_type' => 'admin']);
            if (!empty($errorMessage)) {
                exit('error');
            }
        } else {
            $errorMessage = $this->users->update(['id' => $itemId], ['user_type' => 'user']);
            if (!empty($errorMessage)) {
                exit('error');
            }
        }
        redirect('/panel/users-management');
    }

    public function block(int $itemId)
    {
        $user = current($this->users->get(['id' => $itemId]));
        if ($this->currentUser->user_type == 'admin') {
            if ($user->user_type == 'admin') {
                exit('Invalid Access');
            }
        }
        if ($user->blocked == 'no') {
            $errorMessage = $this->users->update(['id' => $itemId], ['blocked' => 'yes']);
        } else {
            $errorMessage = $this->users->update(['id' => $itemId], ['blocked' => 'no']);
        }
        if (!empty($errorMessage)) {
            exit('error');
        }
        redirect('/panel/users-management');
    }

    public function delete(int $itemId)
    {
        $user = current($this->users->get(['id' => $itemId]));
        if ($this->currentUser->user_type == 'admin') {
            if ($user->user_type == 'admin') {
                exit('Invalid Access');
            }
        }
        $errorMessage = $this->users->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('error in deleting');
        }
        redirect('/panel/users-management');
    }
}
