<?php

namespace App\Controllers;

use App\Middlewares\UsersMiddleware;
use App\Models\Users;
use App\Request\ChangePasswordRequest;
use App\Request\EditProfileRequest;
use App\Request\RegisterRequest;
use App\Services\User\EditProfileService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\databaseHelper;
use Core\System\Helpers\QueryBuilder;

class UserController extends controller
{
    use QueryBuilder;

    private $configHelper;
    private $blade;
    private $lang;
    private $users;
    private $user_id;
    private $currentUser;
    private $request;
    private $validationErrors = null;
    private $queryBuilder;
    private $editProfileService;

    public function __construct()
    {
        if (!isset($_SESSION['EDIT_PROFILE_METHOD'])) {
            $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
        }

        $this->request = request();
        $this->configHelper = new ConfigHelper();
        $this->blade = blade();
        $this->queryBuilder = $this->queryBuilder();
        $this->editProfileService = EditProfileService::getInstance(ConfigHelper::getConfig($_SESSION['EDIT_PROFILE_METHOD']));
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'users');
    }

    public function show()
    {
        $usersList = $this->users->get();
        $view = $this->blade->render('backend/main/layout/users/users-list', [
            'users' => $usersList,
            'lang' => $this->lang,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
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

    public function editProfile()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = null;
        $editProfileView = $this->editProfileService->method()->getViewName();
        if ($editProfileView == 'edit-profile') {
            $errors = $this->request(EditProfileRequest::class);
            if (!empty($this->request) && empty($errors)) {
                if ($this->request['email'] != $this->currentUser->email) {
                    $_SESSION['EDIT_PROFILE_METHOD'] = 'email-verification-edit-prof';
                    $_SESSION['EDIT_PROFILE_DATA'] = $this->request;
                    redirect('/admin/editProfile');
                } else {
                    $updateProcess = $this->users->update($this->currentUser->id, $this->request);
                    if ($updateProcess) {
                        $successMessage = __('users.edit-profile-success');
                        $this->currentUser = current($this->users->get(['id' => $this->currentUser->id]));
                    } else {
                        $errorMessage = 'error';
                    }
                }
            }

            $view = $this->blade->render('backend/main/layout/users/edit-profile', [
                'errors' => $errors,
                'lang' => $this->lang,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
                'user' => $this->currentUser
            ]);

            echo $this->blade->render('backend/main/panel', [
                'view' => $this->blade,
                'content' => $view,
            ]);
        } elseif ($editProfileView == 'email-verification') {
            $verificationCode = rand(100000, 999999);
            if (!empty($this->request)) {
                $editProfileData = $_SESSION['EDIT_PROFILE_DATA'];
                unset($_SESSION['EDIT_PROFILE_DATA']);
//                if ($this->request['verification-code'] == $verificationCode) {
                $updateProcess = $this->users->update($this->currentUser->id, $editProfileData);
                if ($updateProcess) {
                    $successMessage = __('users.edit-profile-success');
                    $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
//                    $this->currentUser = current($this->users->get(['id' => $this->currentUser->id]));
                } else {
                    $errorMessage = 'error';
                }
//                }
                $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
            }
            echo $this->blade->render('backend/email-verification', [
                'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'register'),
                'action' => '/admin/editProfile',
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
            ]);
        }
    }

    public function changePassword()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = null;
        $errors = $this->request(ChangePasswordRequest::class);

        if (!empty($this->request) && empty($errors)) {
            if (password_verify($this->request['password'], $this->currentUser->password)) {
                if ($this->request['new-pass'] == $this->request['rep-new-pass']) {
                    $this->request['new-pass'] = password_hash($this->request['new-pass'], PASSWORD_DEFAULT);
                    $editPassProcess = $this->users->update($this->currentUser->id,
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
        $this->errorMessage = null;
        $this->errorMessage = $this->users->delete($itemId);
        if (!empty($this->errorMessage)) {
            exit('error in deleting');
        }
        redirect('/admin/user/list');
    }

    public function checkAdmin()
    {
        $usersMiddleware = new UsersMiddleware();
        $usersMiddleware->boot();
    }
}
