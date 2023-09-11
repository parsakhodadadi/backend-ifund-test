<?php

namespace App\Controllers;

use App\Models\Users;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use http\Client\Curl\User;

class PanelController extends controller
{
    private $blade;
    private $lang;
    private $userId;
    private $users;
    private $currentUser;

    public function __construct()
    {
        $this->blade = blade();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'dashboard');
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
    }

    public function dashboard()
    {
        echo $this->blade->render('backend/main/layout/dashboard', [
            'view' => $this->blade,
            'lang' => $this->lang,
            'header' => $this->loadBackendHeader(),
        ]);
    }
}