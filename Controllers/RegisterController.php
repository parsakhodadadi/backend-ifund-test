<?php

namespace App\Controllers;

use App\Models\users;
use Jenssegers\Blade\Blade;

class RegisterController
{
    use \databaseHelper;

    private $blade;
    private $model;

    public function __construct()
    {
        $this->blade = blade();
        $this->model = new users();
    }

    public function register()
    {
        $request = request();
        if (!empty($request)) {
            $this->model->insert(['username' => $request['username'], 'password' => $request['password']]);
            print_r($request);
        } else {
            $lang = loadLang('fa', 'register');
            echo $this->blade->make('backend/register',
                [
                    'lang' => $lang,
                    'views' => $this->blade
                ] 
            );
        }
    }
}