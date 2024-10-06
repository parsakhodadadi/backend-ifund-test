<?php

namespace App\Controllers;

use App\Models\Users;
use App\Services\User\EditProfileService;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class ProfileController extends controller
{
    private $blade;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
    }

    public function edit()
    {

    }
}