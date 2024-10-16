<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\EditProfileRequest;
use App\Services\User\EditProfileService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class ProfileController extends controller
{
    private $blade;
    private $request;
    private $users;
    private $currentUser;
    private $userID;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->users = loadModel(Users::class);
        $this->userID = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userID]));
    }

    public function edit()
    {
        $errors = $this->request(EditProfileRequest::class);
        $successMessage = null;
        $errorMessage = null;
        if(!empty($this->request) && empty($errors)) {
            $errorMessage = $this->users->update(['id' => $this->userID], $this->request);
            if (empty($errorMessage)) {
                $successMessage = __('edit-profile.edit-suc');
                $this->currentUser = current($this->users->get(['id' => $this->userID ]));
            }
        }
        $content = $this->blade->render('backend/main/layout/edit-profile', [
            'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'edit-profile'),
            'users' => $this->users,
            'user' => $this->currentUser,
            'errors' => $errors,
            'successMessage' => $successMessage,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'panel'),
            'content' => $content,
            'users' => $this->users,
            'user' => $this->currentUser,
        ]);
    }
}