<?php

namespace App\Controllers;

use Core\System\controller;

if (!define('ACCESS')) die('No script access directly is allowed.');

class homeController extends controller {
    use \databaseHelper;

    private $model;
    private $orFields = ['username', 'password'];
    private $andFields = ['id'];
    private $lang;

    public function __construct()
    {
        $lang = \configHelper::getConfig('default-language');
        //need to be edited
        $this->lang = loadLang($lang,'home');
    }

    public function form() {
        $request = request();
        if (!empty($request)) {

        } else {
            $view = self::view()->blade()->render('login', ['errors' => [], 'lang' => $this->lang]);
            echo $view;
        }
    }

}