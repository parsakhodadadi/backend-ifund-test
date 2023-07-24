<?php

namespace App\Controllers;

use App\Models\Posts;
use App\Models\Users;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\databaseHelper;
use Core\System\Helpers\QueryBuilder;

class HomeController extends controller
{
    use QueryBuilder;

    private object $blade;
    private $posts;
    private $users;
    private $userId;
    private $queryBuilder;
    private $lang;

    public function __construct()
    {
        session_start();
        $this->blade = $this->view()->blade();
        $this->queryBuilder = $this->queryBuilder();
        $this->posts = loadModel(Posts::class);
        $this->users = loadModel(Users::class);
        $this->userId = $_SESSION['USERID'];
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'posts');
    }

    public function show()
    {
        $postsToShow = $this->posts->get();

        $view = $this->blade->render('backend/main/layout/posts/posts-list',[
            'lang' => $this->lang,
            'posts' => $postsToShow,
            'users' => $this->users,
            'status' => 'approved',
            'user_id' => $this->userId,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }
}
