<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\ChangePasswordRequest;
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
    }
}