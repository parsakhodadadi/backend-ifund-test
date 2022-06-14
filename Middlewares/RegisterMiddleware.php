<?php

namespace App\Middlewares;

class RegisterMiddleware {

    public function boot() {
        echo 'RegisterMiddleware';
        return true;
    }

}