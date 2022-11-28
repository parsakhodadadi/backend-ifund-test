<?php

namespace App\Middlewares;

use Core\System\controller;

class LoginMiddleware extends controller {
//     public function __construct() {
//         echo "LoginMiddleware";
//     }

     public function boot() {
         session_start();
         if (!isset($_SESSION['USERID'])) redirect('/login');
         return true;
     }
}