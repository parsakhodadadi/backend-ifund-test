<?php

namespace App\Controllers;

use App\Models\Users;
use App\Request\SignupRequest;
use App\Services\User\SignupService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class SignupController extends controller
{
    private $lang;
    private object $blade;
    private $request;
    private $users;
    private object $signupService;

    public function __construct()
    {
        session_start();
        $this->request = request();
        $lang = ConfigHelper::getConfig('default-language');
        $this->users = loadModel(Users::class);
        if (empty($_SESSION['SIGNUP_METHOD'])) {
            $_SESSION['SIGNUP_METHOD'] = 'sign-up-form';
        }
        $signupMethod = $_SESSION['SIGNUP_METHOD'];
        $this->signupService = SignupService::getInstance(ConfigHelper::getConfig($signupMethod));
        $this->lang = loadLang($lang, 'sign-up');
        $this->blade = $this->view()->blade();
    }

    public function form()
    {
        $successMessage = null;
        $errorMessage = null;
        $errorPassNotEq = null;
        $registeredEmailErr = null;
        $password = null;
        $signupView = $this->signupService->method()->getViewName();
        if ($signupView == 'sign-up-form') {
            $errors = $this->request(SignupRequest::class);
            if (!empty($this->request) && empty($errors)) {
                    if ($this->request['password'] == $this->request['confirm-password']) {
                        unset($this->request['confirm-password']);
                        $password = $this->request['password'];
                        $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
                        $errorMessage = $this->users->insert($this->request);
                        if (empty($errorMessage)) {
                            $successMessage = __('sign-up.create-account-success');
                        } else if ($errorMessage == 23000) {
                            $registeredEmailErr = __('sign-up.registered-email-error');;
                        }
                    } else {
                        $errorPassNotEq = __('sign-up.error-equality-passes');
                    }
//                    $_SESSION['SIGNUP_METHOD'] = current($this->users->get(['email' => $this->request['email']]))->id;
//                    $_SESSION['SIGNUP_METHOD'] = 'email-verification-signup';
//                    redirect('/sign-up');
//                } else {
//                    $errorPassNotEq = $this->lang['not-equal-pass'];
//                }
            }
            echo $this->blade->render('backend/main/layout/sign-up', [
                'lang' => $this->lang,
                'errors' => $errors,
                'errorPassNotEq' => $errorPassNotEq,
                'registeredEmailErr' => $registeredEmailErr,
                'successMessage' => $successMessage,
                'data' => $this->request,
                'password' => $password,
            ]);
        } elseif ($signupView == 'email-verification') {
            $verificationCode = rand(100000, 999999);
            if (!empty($this->request)) {
//                if ($this->request['verification-code'] == $verificationCode) {
                $this->users->update(['id' => $_SESSION['SIGNUPID']], ['email_status' => 'verified']);
                $successMessage = __('signup.create-success');
//                } else {
//                    $errorMessage = __('signup.wrong-verification-code');
//                }

                $_SESSION['SIGNUP_METHOD'] = 'signup-form';
            }
            echo $this->blade->render('frontend/sign-up/email-verification', [
                'lang' => $this->lang,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
                'view' => $this->blade,
            ]);
        }
    }
}
