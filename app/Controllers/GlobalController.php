<?php

namespace App\Controllers;

use Core\System\controller;
use App\Middlewares\LoginMiddleware;
use App\Middlewares\RegisterMiddleware;

class GlobalController extends controller
{
    public function loadMiddlewares()
    {
        $this->middleware([LoginMiddleware::class, RegisterMiddleware::class]);
    }
}
