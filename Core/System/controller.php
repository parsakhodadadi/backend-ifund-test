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

use App\Exception\QueryBuilderException;
use Core\System;
use App\Middlewares\LoginMiddleware;
use http\Env\Request;


class controller
{
    public function loadController($class)
    {
        return new $class();
    }

    public function validation()
    {
        return new Validation();
    }

    public static function view()
    {
        return new View();
    }

    public function security()
    {
        return new \Security();
    }

    public function event()
    {
        return new \Event();
    }

    public function middleware(array $middlewares = [])
    {
        foreach ($middlewares as $middleware) {
            $eachMiddleware = new $middleware();
            $eachMiddleware->boot();
        }
    }

    public function request($request)
    {
        $request = new $request();
        return $request->boot(request());
    }

    public function queryBuilderException()
    {
        return new QueryBuilderException();
    }

//    static public function view($name, $data = null)
//    {
//        view($name, $data);
//    }
}
