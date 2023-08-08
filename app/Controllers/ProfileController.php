<?php

namespace App\Controllers;

use App\Models\Users;
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
    private $editProfileService;
    private $lang;

    public function __construct()
    {
        $this->request = request();
        $this->users = loadModel(Users::class);
        $this->userId = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->blade = $this->view()->blade();
        if (empty($_SESSION['EDIT_PROFILE_METHOD'])) {
            $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
        }
        $editProfileMethod = $_SESSION['EDIT_PROFILE_METHOD'];
        $this->editProfileService = EditProfileService::getInstance(ConfigHelper::getConfig($editProfileMethod));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'profile');
    }

    public function editProfile()
    {
        $successMessage = null;
        $errorMessage = null;
        if ($this->currentUser->photo != null) {
            $profilePhoto = $this->currentUser->photo;
        } else {
            $profilePhoto = "files/default-profile.png";
        }
        $editProfileView = $this->editProfileService->method()->getViewName();
        if ($editProfileView == 'edit-profile') {
            $errors = $this->request(EditProfileRequest::class);
            if (!empty($this->request) && empty($errors)) {
                if ($this->request['mobile_number'] != null) {
                    $_SESSION['EDIT_PROFILE_METHOD'] = 'mobile-verification-edit-prof';
                    if (!empty($_FILES['photo']['name'])) {;
                        $this->uploadPhoto($_FILES['photo']['tmp_name'], 'files/' . $_FILES['photo']['name']);
                        $this->request['photo'] = $_FILES['photo']['name'];
                    }
                    unset($this->request['files']);
                    redirect('/panel/edit-profile');
                } else {
                    if (!empty($_FILES['photo']['name'])) {;
                        $this->uploadPhoto($_FILES['photo']['tmp_name'], 'files/' . $_FILES['photo']['name']);
                        $this->request['photo'] = 'files/' . $_FILES['photo']['name'];
                    }
                    unset($this->request['files']);
                    $updateProcess = $this->users->update(['id' => $this->currentUser->id], $this->request);
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
                'user' => $this->currentUser,
                'profile_photo' => $profilePhoto,
            ]);

            echo $this->blade->render('backend/main/panel', [
                'view' => $this->blade,
                'content' => $view,
                'navigation' => $this->loadNavigation(),
                'header' => $this->loadHeader(),
            ]);
        } elseif ($editProfileView == 'mobile-verification') {
            $verificationCode = rand(100000, 999999);
            if (!empty($this->request)) {
//                if ($this->request['verification-code'] == $verificationCode) {
                $updateProcess = $this->users->update(['id' => $this->currentUser->id], ['mobile_number_status' => 'verified']);
                if ($updateProcess) {
                    $successMessage = __('users.edit-profile-success');
                    $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
                    $this->currentUser = current($this->users->get(['id' => $this->currentUser->id]));
                } else {
                    $errorMessage = 'error';
                }
//                }
                $_SESSION['EDIT_PROFILE_METHOD'] = 'edit-profile';
            }
            echo $this->blade->render('backend/mobile-verification', [
                'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'register'),
                'action' => 'admin/editProfile',
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
            ]);
        }
    }
}