<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\ChangePasswordRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class ChangePasswordController extends controller
{
    private $blade;
    private $request;
    private $lang;
    private $users;
    private $userId;
    private $currentUser;

    public function __construct()
    {
        $this->request = request();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'change-password');
        $this->users = loadModel(Users::class);
        $this->blade = blade();
        $this->userId = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
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
                    $errorMessage = $this->users->update(
                        ['id' => $this->currentUser->id],
                        ['password' => $this->request['new-pass']]
                    );
                    if (empty($errorMessage)) {
                        $successMessage = __('change-password.change-pass-success');
                    } else {
                        $errorMessage = 'error';
                    }
                } else {
                    $errorMessage = __('change-password.passwords-not-match');
                }
            } else {
                $errorMessage = __('change-password.error-curr-pass');
            }
        }

        $view = $this->blade->render('backend/main/layout/users/change-password', [
            'errors' => $errors,
            'lang' => $this->lang,
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
}
