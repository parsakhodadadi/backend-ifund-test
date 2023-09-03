<?php

namespace App\Controllers;

use App\Middlewares\AdminMiddleware;
use App\Middlewares\ManagerMiddleware;
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

    public function __construct()
    {
        $this->request = request();
        $this->blade = blade();
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'users');
    }

    public function management()
    {
        $users = $this->users->get();
        $view = $this->blade->render('backend/main/layout/users/management', [
            'users' => $users,
            'lang' => $this->lang,
            'currentUser' => $this->currentUser,
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

    public function delete(int $itemId)
    {
        $errorMessage = $this->users->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('error in deleting');
        }
        redirect('/panel/users-management');
    }
}
