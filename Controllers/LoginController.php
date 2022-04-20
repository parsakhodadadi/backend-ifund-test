<?php

namespace App\Controllers;

use App\Models\users;
use Core\System\controller;

class LoginController extends controller
{
    use \databaseHelper;
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
}