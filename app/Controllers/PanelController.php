<?php

namespace App\Controllers;

use App\Models\LikedPosts;
use App\Models\PageViews;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Viewers;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use http\Client\Curl\User;

class PanelController extends controller
{
    private $blade;
    private $lang;
    private $users;
    private $currentUser;
    private $likes;
    private $posts;

    public function __construct()
    {
        $this->blade = blade();
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $_SESSION['USERID']]));
    }

    public function panel() 
    {
        $content = $this->blade->render('backend/main/layout/dashboard');
        echo $this->blade->render('backend/main/panel', [
            'content' => $content,
            'view' => $this->blade,
            'user' => $this->currentUser,
            'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'panel'),
        ]);
    }
}
