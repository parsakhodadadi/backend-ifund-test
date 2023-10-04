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
    private $userId;
    private $users;
    private $currentUser;
    private $likes;
    private $posts;

    public function __construct()
    {
        $this->blade = blade();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'dashboard');
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->likes = loadModel(LikedPosts::class);
        $this->posts = loadModel(Posts::class);
    }

    public function dashboard()
    {
        $pages = loadModel(PageViews::class)->get();
        $viewers = loadModel(Viewers::class)->get();
        $views = 0;
        foreach ($pages as $page) {
            $views += $page->views;
        }
        echo $this->blade->render('backend/main/layout/dashboard', [
            'view' => $this->blade,
            'lang' => $this->lang,
            'header' => $this->loadBackendHeader(),
            'likes' => $this->likes->get(),
            'posts' => $this->posts->get(),
            'views' => $views,
            'viewers' => $viewers,
        ]);
    }
}
