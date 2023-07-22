<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Models\Users;
use App\Request\RegisterRequest;
use App\Services\User\RegisterService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Jenssegers\Blade\Blade;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilder;


class RegisterController extends controller
{
    use \Core\System\Helpers\QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private $request;
    private $queryBuilder;
    private $configHelper;
    private object $registerService;

    public function __construct()
    {
        session_start();

        if (!isset($_SESSION['REGISTER_METHOD'])) {
            $_SESSION['REGISTER_METHOD'] = 'register-form';
        }

        $this->request = request();
        $this->queryBuilder = $this->queryBuilder();
        $this->configHelper = new ConfigHelper();
        $lang = $this->configHelper::getConfig('default-language');
        $registerMethod = $_SESSION['REGISTER_METHOD'];
        $this->registerService = RegisterService::getInstance($this->configHelper::getConfig($registerMethod));
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
                    $_SESSION['REGISTER_DATA'] = $this->request;
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
            $registerData = $_SESSION['REGISTER_DATA'];
            unset($_SESSION['REGISTER_DATA']);
            if (!empty($this->request)) {
                if ($this->request['verification-code'] == $verificationCode) {
                    $registerData['password'] = password_hash($registerData['password'], PASSWORD_DEFAULT);
                    $registerData['user_type'] = 'user';
                    $registerData['blocked'] = 'yes';
                    $users = loadModel(Users::class);
                    $errorMessage = $users->insert($_SESSION['REGISTER_DATA']);
                    if (empty($errorMessage)) {
                        $successMessage = __('register.success');
                    }
                } else {
                    $errorMessage = __('register.wrong-verification-code');
                }
                $_SESSION['REGISTER_METHOD'] = 'register-form';
            }
            echo $this->blade->render('backend/email-verification', [
                'lang' => $this->lang,
                'successMessage' => $successMessage,
                'errorMessage' => $errorMessage,
                'action' => 'register'
            ]);
        }
    }

}