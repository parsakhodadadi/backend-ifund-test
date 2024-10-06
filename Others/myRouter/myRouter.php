<?php

namespace Others\myRouter;

use Core\System\controller;
use App\Controllers\userController;

class myRouter {

    public function checkGetRequest($paramName = null, $pageName = null)
    {
        if (isset($_GET[$paramName]) && isset($pageName))
        {
            if ($_GET[$paramName] == $pageName)
            {
                return true;
            } else {
                return false;
            }
        }
    }

    public function route($method = 1, $pattern = null, $pageName = null, $fn = null) {
        if ($method == 1) {
            if (isset($pattern) && isset($fn)) {
                if ($this->checkGetRequest($pattern, $pageName)) {
                    $userController = new userController();
                    $fnArray = explode('@',$fn);
                    $controllerClass = $fnArray[0];
                    $controllerMethod = $fnArray[1];
                    call_user_func([$controllerClass,$controllerMethod]);
                    echo $controllerClass;
                    echo '<br>';
                    echo $controllerMethod;
                }
            } else {
                echo null;
            }
        }
    }


}