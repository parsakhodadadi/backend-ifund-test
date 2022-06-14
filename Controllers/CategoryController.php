<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Models\users;
use Core\System\controller;

class CategoryController extends controller {

    private object $loginMiddleware;
    private $lang;
    private object $blade;

    public function __construct() {
        $this->loginMiddleware = new LoginMiddleware();
//        $this->loginMiddleware->boot();
        $lang = \configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'category');
        $this->blade = $this->view()->blade();
    }
//
    public function create() {
//        $this->loginMiddleware->boot();
        $request = request();
//        if (!empty($request)) {
//            echo '<pre>';
//            print_r($request);
//        } else {
//            $view = $this->blade->render('backend/main/layout/category/create', ['view' => $this->blade, 'lang' => $this->lang]);
//            echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content' => $view, 'lang' => $this->lang]);
//        }
    }
//
//    public function update() {
//
//    }
}