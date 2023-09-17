<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\ChangePasswordRequest;
use App\Request\EditPersonalInfoRequest;
use App\Request\EditProfileRequest;
use App\Services\User\EditProfileService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class ProfileController extends controller
{
    private $request;
    private $users;
    private $userId;
    private $currentUser;
    private $blade;
    private $lang;

    public function __construct()
    {
        $this->request = request();
        $this->users = loadModel(Users::class);
        $this->userId = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->blade = $this->view()->blade();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'profile');
    }

    public function edit()
    {
        $successMessage = null;
        $errorMessage = null;
        if ($this->currentUser->photo != null) {
            $profilePhoto = $this->currentUser->photo;
        } else {
            $profilePhoto = "files/default-profile.png";
        }

        $errors = $this->request(EditProfileRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if (!empty($_FILES['photo']['name'])) {
                $this->uploadPhoto($_FILES['photo']['tmp_name'], 'files/' . $_FILES['photo']['name']);
                $this->request['photo'] = 'files/' . $_FILES['photo']['name'];
            }
            unset($this->request['files']);
            $errorMessage = $this->users->update(['id' => $this->currentUser->id], $this->request);
            if (empty($errorMessage)) {
                $successMessage = __('users.edit-profile-success');
                $this->currentUser = current($this->users->get(['id' => $this->currentUser->id]));
            } else {
                $errorMessage = 'error';
            }
        }

        echo $this->blade->render('backend/main/layout/users/edit-profile', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessageProfile' => $successMessage,
            'errorMessage' => $errorMessage,
            'user' => $this->currentUser,
            'profile_photo' => $profilePhoto,
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function editPersonalInfo()
    {
        $errorMessage = null;
        $successMessage = null;
//        $errors = $this->request(EditPersonalInfoRequest::class);
        if (!empty($this->request)) {
//            if ($this->request['email'] == $this->currentUser->email) {
//                exit('');
//            }
            $errorMessage = $this->users->update(['id' => $this->userId], $this->request);
            if (empty($errorMessage)) {
                $this->currentUser = current($this->users->get(['id' => $this->userId]));
                $successMessage = __('profile.data-updated-suc');
            }
        }
        echo $this->blade->render('backend/main/layout/users/edit-profile', [
            'lang' => $this->lang,
            'successMessagePersonalInfo' => $successMessage,
            'errorMessage' => $errorMessage,
            'user' => $this->currentUser,
            'profile_photo' => $this->currentUser->photo,
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function editSocialMedia()
    {
        $errorMessage = null;
        $successMessage = null;
        if (!empty($this->request)) {
            $errorMessage = $this->users->update(['id' => $this->userId], $this->request);
            if (empty($errorMessage)) {
                $this->currentUser = current($this->users->get(['id' => $this->userId]));
                $successMessage = __('profile.data-updated-suc');
            }
        }
        echo $this->blade->render('backend/main/layout/users/edit-profile', [
            'lang' => $this->lang,
            'successMessageSocialMedia' => $successMessage,
            'errorMessage' => $errorMessage,
            'user' => $this->currentUser,
            'profile_photo' => $this->currentUser->photo,
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function changePassword()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(ChangePasswordRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if (password_verify($this->request['current-password'], $this->currentUser->password)) {
                if ($this->request['new-password'] == $this->request['confirm-password']) {
                    $this->request['new-password'] = password_hash($this->request['new-password'], PASSWORD_DEFAULT);
                    $errorMessage = $this->users->update(
                        ['id' => $this->currentUser->id],
                        ['password' => $this->request['new-password']]
                    );
                    if (empty($errorMessage)) {
                        $successMessage = __('profile.change-pass-success');
                    } else {
                        $errorMessage = 'error';
                    }
                } else {
                    $errorMessage = __('profile.passwords-not-match');
                }
            } else {
                $errorMessage = __('profile.error-curr-pass');
            }
        }

        echo $this->blade->render('backend/main/layout/users/edit-profile', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessageChangePassword' => $successMessage,
            'errorMessageChangePassword' => $errorMessage,
            'user' => $this->currentUser,
            'profile_photo' => $this->currentUser->photo,
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function editProfileSettings()
    {

//        echo $this->blade->render('backend/main/layout/users/edit-profile', [
//            'errors' => $errors,
//            'lang' => $this->lang,
//            'successMessageChangePassword' => $successMessage,
//            'errorMessageChangePassword' => $errorMessage,
//            'user' => $this->currentUser,
//            'profile_photo' => $this->currentUser->photo,
//            'view' => $this->blade,
//            'header' => $this->loadBackendHeader(),
//        ]);
    }
}