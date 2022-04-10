<?php

namespace App\Controllers;

use Core\System\controller;

if (!define('ACCESS')) die('No script access directly is allowed.');

class homeController extends controller {

    use \databaseHelper;

    public function home()
    {

    }

}