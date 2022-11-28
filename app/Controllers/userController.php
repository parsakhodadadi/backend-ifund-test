<?php

namespace App\Controllers;
use App\Models\users;
use Core\System\controller;

if (!defined('ACCESS'))
    die('No script access directly is allowed.');

class userController extends controller
{
    use \databaseHelper;

    private $userController;
    static $blade;

    public function __construct()
    {
        self::$blade = blade();
    }

    public function registerData()
    {
        $lang = loadLang('fa', 'login');

        echo self::$blade->make('Backend/main/layout/register-form', ['lang'=>$lang, 'view'=>self::$blade]);


        if (!empty($_POST)) {
            $users = new users();

            $users->insert($_POST);
        }
    }

    public function checkLoginInfo($data = ['username'=>'ali', 'password'=>'123'])
    {
        $status = self::pdoSelect('users', "username = '{$data['username']}' and password = '{$data['password']}'");
        $lang = loadLang('fa', 'login');

        if (!empty($status)) {
            echo self::$blade->make('Backend/main/index', ['lang'=>$lang, 'view'=>self::$blade]);

            echo "YES";
        } else {
            echo "wrong information";
        }
    }

    public function login()
    {
        $lang = loadLang('fa', 'login');

        echo self::$blade->make('Backend/main/layout/login-form', ['lang'=>$lang, 'view'=>self::$blade]);
    }

    public function panelTEST() {
        echo "yes";
    }
}