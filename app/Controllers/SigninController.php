<?php

namespace App\Controllers;

use App\Middlewares\AdminMiddleware;
use App\Middlewares\FulladminMiddleware;
use App\Models\Users;
use App\Services\User\SigninAuth;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use App\Middlewares\SigninMiddleware;

class SigninController extends controller
{
    private $request;
    private object $authService;
    private $lang;
    private object $blade;
    private $users;
    private $configHelper;
    private $errorMessage;

    public function __construct()
    {
        $this->request = request();
        $this->configHelper = new ConfigHelper();
        $this->authService = SigninAuth::getInstance($this->configHelper::getConfig('sign-in-method'));
        $this->blade = blade();
        $this->users = loadModel(Users::class);
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'sign-in');
    }

    public function form()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $signinViewName = $this->authService->method()->getViewName();
        if ($signinViewName == 'user-password-sign-in' || $signinViewName == 'otp-sign-in') {
            if (isset($_SESSION['USERID'])) {
                if (!empty($this->request)) {
                    die(json_encode(['code' => 200, 'message' => 'success', 'status' => true]));
                } else {
                    redirect('/panel');
                }
            }

            if (!empty($this->request)) {
                if (!$this->security()->checkCSRFToken($this->request['csrf_token'])) {
                    echo 'false';
                }

                unset($this->request['csrf_token']);

                $rules = [
                    'email' => 'required',
                    'password' => 'required',
                ];

                $messages = [
                    'email.required' => 'نام الزامی می باشد',
                    'password.required' => 'پسورد الزامی می باشد',
                ];

                $errors = $this->validation()->check($rules, $this->request, $messages);

                if (!empty($errors)) {
                    die($this->view()->blade()
                        ->render('frontend/sign-in/user-password-sign-in', [
                            'errors' => $errors,
                            'view' => $this->blade,
                        ]));
                }

                $password = $this->request['password'];
                unset($this->request['password']);
                $user = current($this->users->get($this->request));
                if (!empty($user)) {
                    if (!password_verify($password, $user->password)) {
                        if ($this->security()->attempt()) {
                            $this->event()->blockUserPerTime(15);
                        }
                        $errorMessage = $this->lang['wrong-credential'];
                        die($this->blade->render('frontend/sign-in/user-password-sign-in', [
                            'errorMessage' => $errorMessage,
                            'errors' => [],
                            'security' => $this->security(),
                            'lang' => $this->lang,
                            'view' => $this->blade,
                        ]));
                    }
                } else {
                    $errorMessage = $this->lang['wrong-credential'];
                    die($this->blade->render('frontend/sign-in/user-password-sign-in', [
                        'errorMessage' => $errorMessage,
                        'errors' => [],
                        'security' => $this->security(),
                        'lang' => $this->lang,
                        'view' => $this->blade,
                    ]));
                }

                if (empty($this->users)) {
                    if ($this->security()->attempt()) {
                        $this->event()->blockUserPerTime(15);
                        if (!$this->event()->decayUserPerTime('attempt')) {
                            $this->errorMessage = $this->lang['blocked'];
                            die($this->blade->render('frontend/sign-in/user-password-sign-in', [
                                'errorMessage' => $this->errorMessage,
                                'errors' => [],
                                'security' => $this->security(),
                                'lang' => $this->lang,
                                'view' => $this->blade,
                            ]));
                        }
                    }
                }

                if (is_int($this->users)) {
                    die(self::view()->blade()->render("backend/errors/$this->users"));
                } else {
                    $_SESSION['USERID'] = $user->id;
//                    echo json_encode(['code' => 200, 'message' => 'success', 'status' => true]);
                }
                redirect('/panel');
            } else {
                echo $this->blade->render("frontend/sign-in/$signinViewName", [
                    'view' => $this->blade,
                    'errors' => [],
                    'security' => $this->security(),
                    'lang' => $this->lang,
                ]);
                exit('heyy');
            }
        } else {
            if ($signinViewName == 'otp-signin') {
            } else {
                echo '404 not found';
            }
        }
    }

    public function checkSignin()
    {
        $signinMiddleware = new SigninMiddleware();
        $signinMiddleware->boot();
    }

    public function checkAdmin()
    {
        $adminMiddleware = new AdminMiddleware();
        $adminMiddleware->boot();
    }

    public function checkFullAdmin()
    {
        $managerMiddleware = new FulladminMiddleware();
        $managerMiddleware->boot();
    }

    public function signOut()
    {
        session_start();
        if (isset($_SESSION['USERID'])) {
            unset($_SESSION['USERID']);
            redirect('/sign-in');
        }
        redirect('/sign-in');
    }
}
