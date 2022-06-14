<?php

namespace App\Controllers;

use Core\System\controller;
use App\Middlewares;

class GlobalController extends controller {

    public function loadMiddlewares() {
        $this->middleware([Middlewares\LoginMiddleware::class, Middlewares\RegisterMiddleware::class]);
    }

    public function checkLogin() {
        session_start();
        if (!isset($_SESSION['USERID'])) redirect('/login');
    }
}