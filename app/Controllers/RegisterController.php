<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\RegisterRequest;
use App\Services\User\RegisterService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class RegisterController extends controller
{
    private $lang;
    private object $blade;
    private $request;
    private $users;
    private object $registerService;

    public function __construct()
    {
        session_start();
        $this->request = request();
        $lang = ConfigHelper::getConfig('default-language');
        $this->users = loadModel(Users::class);
        if (empty($_SESSION['REGISTER_METHOD'])) {
            $_SESSION['REGISTER_METHOD'] = 'register-form';
        }
        $registerMethod = $_SESSION['REGISTER_METHOD'];
        $this->registerService = RegisterService::getInstance(ConfigHelper::getConfig($registerMethod));
        $this->lang = loadLang($lang, 'register');
        $this->blade = $this->view()->blade();
    }

    public function register()
    {
        $successMessage = null;
        $errorMessage = null;
        $errorPassNotEq = null;
        $registerView = $this->registerService->method()->getViewName();
        if ($registerView == 'register-form') {
            $errors = $this->request(RegisterRequest::class);
            if (!empty($this->request) && empty($errors)) {
                if ($this->request['password'] == $this->request['rep-pass']) {
                    unset($this->request['rep-pass']);
                    $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
                    $this->request['user_type'] = 'user';
                    $this->request['email_status'] = 'unverified';
                    $this->request['blocked'] = 'no';
                    $this->users->insert($this->request);
                    $_SESSION['REGISTERID'] = current($this->users->get(['email' => $this->request['email']]))->id;
                    $_SESSION['REGISTER_METHOD'] = 'email-verification-register';
                    redirect('/register');
                } else {
                    $errorPassNotEq = $this->lang['not-equal-pass'];
                }
            }
            echo self::view()->blade()->render('backend/register-form', [
                'errors' => $errors,
                'lang' => $this->lang,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
                'errorPassNotEq' => $errorPassNotEq,
            ]);
        } elseif ($registerView == 'email-verification') {
            $verificationCode = rand(100000, 999999);
            if (!empty($this->request)) {
//                if ($this->request['verification-code'] == $verificationCode) {
                    $this->users->update(['id' => $_SESSION['REGISTERID']], ['email_status' => 'verified']);
                    $successMessage = __('register.create-success');
//                } else {
//                    $errorMessage = __('register.wrong-verification-code');
//                }

                $_SESSION['REGISTER_METHOD'] = 'register-form';
            }
            echo $this->blade->render('backend/email-verification', [
                'lang' => $this->lang,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
                'action' => 'register',
            ]);
        }
    }
}
