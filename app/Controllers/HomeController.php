<?php

namespace App\Controllers;

use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class HomeController extends controller
{
    private object $blade;

    public function __construct()
    {
        $this->blade = $this->view()->blade();
    }

    public function homePage()
    {
        exit('heyyyyyyy');
    }
}
