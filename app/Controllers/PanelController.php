<?php

namespace App\Controllers;

use App\Models\menus;
use App\Models\users;
use Core\System\controller;
use Core\System\validation;
use MyClass;

class PanelController extends controller
{
    use \databaseHelper;

    public function panel()
    {
        $lang = loadLang('fa', 'login');
        $blade = self::view()->blade();
        echo $blade->render(
            'backend/main/panel',
            [
                'view' => $blade,
                'lang' => $lang,
            ]
        );
    }
}
