<?php

namespace App\Controllers;

use Core\System\controller;

class HomeController extends controller
{
    use \databaseHelper;

    private $model;
    private $orFields = ['username', 'password'];
    private $andFields = ['id'];
    private $lang;

    public function __construct()
    {
        $lang = \configHelper::getConfig('default-language');
        //need to be edited
        $this->lang = loadLang($lang, 'home');
    }

    public function form()
    {
        $this->lang = loadLang('fa', 'login');
        $request = request();
        if (!empty($request)) {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];

            $messages = [
                'email.required' => 'نام الزامی می باشد',
                'password.required' => 'پسورد الزامی می باشد',
            ];

            $errors = $this->validation()->check($rules, $request, $messages);

            if (!empty($errors)) {
                echo self::view()->blade()->render('backend/login', [
                    'errors' => [],
                    'security' => $this->security(),
                    'lang' => $this->lang
                ]);
            } else {
                print_r($request);
            }
        } else {
            $view = self::view()->blade()->render('backend/login', [
                'errors' => [],
                'security' => $this->security(),
                'lang' => $this->lang
            ]);
            echo $view;
        }
    }
}
