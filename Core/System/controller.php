<?php
/**
 *description
 *
 * created by:Parsa
 * email:parsakhodadadi2003@gmail.com
 * who:
 * updated at:
 *
 */

namespace Core\System;
use \Core\System;
use App\Middlewares\LoginMiddleware;

class controller
{

    public function loadController($class)
    {
        return new $class;
    }

    public function validation() {
        return new Validation();
    }

    static public function view() {
        return new View();
    }

    public function security() {
        return new \Security();
    }

    public function event() {
        return new \Event();
    }

    public function middleware(array $middlewares = []) {
        foreach ($middlewares as $middleware) {
            $eachMiddleware = new $middleware;
            $eachMiddleware->boot();
        }
    }

//    static public function view($name, $data = null)
//    {
//        view($name, $data); 
//    }


}