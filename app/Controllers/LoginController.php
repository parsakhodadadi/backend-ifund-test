<?php

namespace App\Controllers;

use App\Models\Users;
use App\Services\User\LoginAuth;
use App\Services\User\DesignPatterns\Strategy\Methods\EmailLogin;
use App\Services\User\DesignPatterns\Strategy\Methods\OtpLogin;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\databaseHelper;
use App\Middlewares\LoginMiddleware;
use Couchbase\User;

class LoginController extends controller
{

    private object $authService;
    private $lang;
    private $blade;
    private $model;
    private $configHelper;

    public function __construct()
    {
        $this->configHelper = new ConfigHelper();
        $this->authService = LoginAuth::getInstance($this->configHelper::getConfig('login-method'));
        $this->blade = blade();
        $this->model = new users();
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang('fa', 'login');
    }

    public function form()
    {
        $loginViewName = $this->authService->method()->getViewName();
        if ($loginViewName == 'user-password-login' || $loginViewName == 'otp-login') {
//            if(empty(session_id()) && !headers_sent()){
                session_start();
//            }
            $request = request();
            if (isset($_SESSION['USERID'])) {
                if (!empty($request)) {
                    die(json_encode(['code' => 200, 'message' => 'success', 'status' => true]));
                } else {
                    redirect('/admin');
                }
            }

            if (!empty($request)) {
                if (!$this->security()->checkCSRFToken($request['csrf_token'])) {
                    echo 'false';
                }

                unset($request['csrf_token']);

                $rules = [
                    'email' => 'required',
                    'password' => 'required',
                ];

                $messages = [
                    'email.required' => 'نام الزامی می باشد',
                    'password.required' => 'پسورد الزامی می باشد',
                ];

                $errors = $this->validation()->check($rules, $request, $messages);

                if (!empty($errors)) {
                    die($this->view()->blade()
                        ->render('backend/login', [
                            'errors' => $errors,
                            'view' => $this->view()
                        ]));
                }

                $password = $request['password'];
                unset($request['password']);

                $users = loadModel(Users::class);
                $user = current($users->get($request));

                if (!password_verify($password, $user->password)) {
                    echo json_encode(['code' => 401, 'message' => 'wrong password', 'status' => false]);
                    exit();
                }

                if (empty($users)) {
                    if ($this->security()->attempt()) {
                        $this->event()->blockUserPerTime(15);
                        if (!$this->event()->decayUserPerTime('attempt')) {
                            exit('BLOCKED');
                        }
                    }
                }

                if (is_int($users)) {
                    die(self::view()->blade()->render("backend/errors/$users"));
                } else {
                    $_SESSION['USERID'] = $user->id;
                    echo json_encode(['code' => 200, 'message' => 'success', 'status' => true]);
                }

                echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content']);
            } else {
                echo self::view()->blade()->render("backend/$loginViewName", [
                    'errors' => [],
                    'security' => $this->security(),
                    'lang' => $this->lang,
                ]);
            }
        } else {
            if ($loginViewName == 'otp-login') {
            } else {
                echo '404 not found';
            }
        }
    }

    public function checkLogin()
    {
        $loginMiddleware = new LoginMiddleware();
        $loginMiddleware->boot();
    }

    public function logout()
    {
//        if(empty(session_id()) && !headers_sent()){
            session_start();
//        }
        if (isset($_SESSION['USERID'])) {
            unset($_SESSION['USERID']);
            redirect('/login');
        }
        redirect('/login');
    }
}
