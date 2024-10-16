<?php

namespace App\Controllers;

use App\Models\Users;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class UsersController extends controller {
    private object $blade;
    private $currentUser;
    private $users;

    private $lang;

    public function __construct()
    {
        $this->blade = blade();
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
    }
    public function management() {
        $content = $this->blade->render('backend/main/layout/users-management', [
            'user' => $this->currentUser,
            'users' => $this->users->get(),
            'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'users'),
        ]);
        echo $this->blade->render('backend/main/panel', [
           'content' => $content,
           'user' => $this->currentUser,
           'users' => $this->users->get(),
           'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'panel'),
        ]);
    }

    public function block(int $itemId)
    {
        $user = current($this->users->get(['id' => $itemId]));
        if ($this->currentUser->user_type == 'admin') {
            if ($user->user_type == 'admin') {
                exit('<b>Invalid Access</b>');
            }
        }
        if ($user->status == 'blocked') {
            $errorMessage = $this->users->update(['id' => $itemId], ['status' => 'active']);
        } else {
            $errorMessage = $this->users->update(['id' => $itemId], ['status' => 'blocked']);
        }
        if (!empty($errorMessage)) {
            exit('<b>error</b>');
        }
        redirect('/panel/users-management');
    }

    public function delete(int $itemId)
    {
        $user = current($this->users->get(['id' => $itemId]));
        if ($this->currentUser->user_type == 'admin') {
            if ($user->user_type == 'admin') {
                exit('<b>Invalid Access</b>');
            }
        }
        $errorMessage = $this->users->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('<b>error in deleting</b>');
        }
        redirect('/panel/users-management');
    }

    public function promoteToInstructor(int $itemId)
    {
        if (current($this->users->get(['id' => $itemId]))->user_type == 'user') {
            $errorMessage = $this->users->update(['id' => $itemId], ['user_type' => 'instructor']);
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
}