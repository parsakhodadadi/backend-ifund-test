<?php

namespace App\Controllers;

use App\Middlewares\AdminMiddleware;
use App\Middlewares\ManagerMiddleware;
use App\Models\Users;
use App\Request\ChangePasswordRequest;
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

    public function __construct()
    {
        $this->request = request();
        $this->blade = blade();
        $this->editProfileService = EditProfileService::getInstance(ConfigHelper::getConfig($_SESSION['EDIT_PROFILE_METHOD']));
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'users');
    }

    public function show()
    {
        $usersList = $this->users->get();
        $view = $this->blade->render('backend/main/layout/users/list', [
            'users' => $usersList,
            'lang' => $this->lang,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function editAccess(int $itemId)
    {
        $successMessage = null;
        $errorMessage = null;
        $userToEdit = current($this->users->get(['id' => $itemId]));
        if (!empty($this->request)) {
            $updateProcess = $this->users->update($userToEdit->id, $this->request);
            if ($updateProcess) {
                $userToEdit = current($this->users->get(['id' => $itemId]));
                $successMessage = __('users.edit-access-success');
            } else {
                $errorMessage = 'error';
            }
        }

        echo $this->blade->render('backend/main/layout/users/edit-access', [
            'lang' => $this->lang,
            'user' => $userToEdit,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);
    }

    public function changePassword()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(ChangePasswordRequest::class);

        if (!empty($this->request) && empty($errors)) {
            if (password_verify($this->request['password'], $this->currentUser->password)) {
                if ($this->request['new-pass'] == $this->request['rep-new-pass']) {
                    $this->request['new-pass'] = password_hash($this->request['new-pass'], PASSWORD_DEFAULT);
                    $editPassProcess = $this->users->update(['id' => $this->currentUser->id],
                        ['password' => $this->request['new-pass']]);
                    if ($editPassProcess) {
                        $successMessage = __('users.change-pass-success');
                    } else {
                        $errorMessage = 'error';
                    }
                } else {
                    $errorMessage = __('users.passwords-not-match');
                }
            } else {
                $errorMessage = __('users.error-curr-pass');
            }
        }

        echo $this->blade->render('backend/main/layout/users/change-password', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);
    }

    public function delete(int $itemId)
    {
        $errorMessage = $this->users->delete($itemId);
        if (!empty($errorMessage)) {
            exit('error in deleting');
        }
        redirect('/panel/management/users');
    }

    public function checkAdmin()
    {
        $adminMiddleware = new AdminMiddleware();
        $adminMiddleware->boot();
    }

    public function checkFullAdmin()
    {
        $managerMiddleware = new ManagerMiddleware();
        $managerMiddleware->boot();
    }
}