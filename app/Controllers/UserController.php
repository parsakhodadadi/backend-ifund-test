<?php

namespace App\Controllers;

use App\Middlewares\AdminMiddleware;
use App\Middlewares\ManagerMiddleware;
use App\Models\Posts;
use App\Models\Users;
use App\Request\ChangePasswordRequest;
use App\Request\EditAccessRequest;
use App\Request\EditProfileRequest;
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

    public function editAccess(int $itemId)
    {
        $successMessage = null;
        $errorMessage = null;
        $user = current($this->users->get(['id' => $itemId]));
        $errors = $this->request(EditAccessRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $errorMessage = $this->users->update(['id' => $user->id], $this->request);
            if (empty($errorMessage)) {
                $user = current($this->users->get(['id' => $itemId]));
                $successMessage = __('users.edit-access-success');
            }
        }

        $view = $this->blade->render('backend/main/layout/users/edit-access', [
            'errors' => $errors,
            'lang' => $this->lang,
            'user' => $user,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
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
