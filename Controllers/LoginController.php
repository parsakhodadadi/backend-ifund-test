<?php

namespace App\Controllers;

use App\Models\users;
use Core\System\controller;
use Couchbase\User;

class LoginController extends controller
{
    use \databaseHelper;
    private $lang;
    private $blade;
    private $model;

    public function __construct()
    {
        $this->blade = blade();
        $this->model = new users();
    }

    public function login()
    {
//        foreach ($menus as $menu) {
//            echo $menu->name . '<br>';
//        }
//        echo '<pre>';
//        var_dump($menus);
//        exit();

        $request = request();
        if (!empty($request)) {
            $users = $this->model->checkUser($request);
            print_r($users);
        } else {
            $lang = loadLang('fa', 'login');
            echo $this->blade->make('backend/login',
                [
                    'lang' => $lang,
                    'views' => $this->blade,
                ]
            );
        }
    }

    public function form() {
//        echo 'form';
        session_start();
        $request = request();
        if (isset($_SESSION['USERID'])) {
            if (!empty($request)) {
                die(json_encode(['code' => 200, 'message' => 'success', 'status' => true]));
            } else {
                redirect('/admin');
            }
        }

        $this->lang = loadLang('fa','login');

        if (!empty($request)) {
            if ($this->security()->checkCSRFToken($request['csrf_token'])) {
                echo 'false';
            }

            unset($request['csrf_token']);

            $rules = [
                'name' => 'required',
                'password' => 'required|max',
            ];

            $messages = [
                'username.required' => $this->lang['username.required'],
                'password.required' => $this->lang['password.required'],
                'password.max' => $this->lang['password.max'],
            ];

            $errors = $this->validation()->rules($rules, $request, $messages);

            if (!empty($errors)) {
                die($this->view()->blade()->render('backend/main/login', ['errors' => $errors, 'view' => $this->view()]));
            }

            $password = $request['password'];
            unset($request['password']);

            $users = loadModel(users::class);
            $user = current($users->getUsers($request));

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
        } else {
            echo self::view()->blade()->render('backend/login', [
                'errors' => [],
                'security' => $this->security(),
                'lang' => $this->lang,
            ]);
        }
    }

    public function checkLogin() {
        session_start();
        if (!isset($_SESSION['USERID'])) redirect('/login');
    }

    public function logout() {
        session_start();
        if(isset($_SESSION['USERID'])) {
            unset($_SESSION['USERID']);
            redirect('/login');
        }
        redirect('/login');
    }

}   