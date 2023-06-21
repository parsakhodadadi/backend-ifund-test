<?php

namespace App\Controllers;

use App\Models\Users;
use App\Services\User\Auth;
use App\Services\User\DesignPatterns\Strategy\Methods\EmailLogin;
use App\Services\User\DesignPatterns\Strategy\Methods\OtpLogin;
use Core\System\controller;
use Couchbase\User;

class LoginController extends controller
{
    use \databaseHelper;

    private object $authService;
    private $lang;
    private $blade;
    private $model;

    public function __construct()
    {
        $this->authService = Auth::getInstance(\configHelper::getConfig('login_method'));
        $this->blade = blade();
        $this->model = new users();
    }

    public function form()
    {
        $loginViewName = $this->authService->method()->getViewName();

        session_start();
        $request = request();
        if (isset($_SESSION['USERID'])) {
            if (!empty($request)) {
                die(json_encode(['code' => 200, 'message' => 'success', 'status' => true]));
            } else {
                redirect('/admin');
            }
        }

        $this->lang = loadLang('fa', 'login');

        if (!empty($request)) {
            if ($this->security()->checkCSRFToken($request['csrf_token'])) {
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

            print_r($request);

            $users = loadModel(users::class);
            $user = current($users->getUsers($request));

            echo $password;
            echo '<br>';
            echo $user->password;


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

            echo $this->blade->render('backend/main/panel', ['view' => $this->blade , 'content']);
        } else {
            echo self::view()->blade()->render("backend/$loginViewName", [
                'errors' => [],
                'security' => $this->security(),
                'lang' => $this->lang,
            ]);
        }
    }

    public function checkLogin()
    {
        session_start();
        if (!isset($_SESSION['USERID'])) {
            redirect('/login');
        }
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['USERID'])) {
            unset($_SESSION['USERID']);
            redirect('/login');
        }
        redirect('/login');
    }
}
