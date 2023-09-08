<?php

namespace App\Controllers;

use Core\System\controller;
use App\Middlewares\SigninMiddleware;

class GlobalController extends controller
{
    public function loadMiddlewares()
    {
        $this->middleware([SigninMiddleware::class]);
    }
}
