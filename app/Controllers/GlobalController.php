<?php

namespace App\Controllers;

use Core\System\controller;
use App\Middlewares\LoginMiddleware;

class GlobalController extends controller
{
    public function loadMiddlewares()
    {
        $this->middleware([LoginMiddleware::class]);

    }
}
