<?php

namespace App\Controllers;

use App\Model\Authors;
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
    private $postsLang;
    private $authorsLang;
    private $authors;

    public function __construct()
    {
        session_start();
        $this->blade = $this->view()->blade();
        $this->queryBuilder = $this->queryBuilder();
        $this->posts = loadModel(Posts::class);
        $this->users = loadModel(Users::class);
        $this->authors = loadModel(Authors::class);
        $this->userId = $_SESSION['USERID'];
        $lang = ConfigHelper::getConfig('default-language');
        $this->postsLang = loadLang($lang, 'posts');
        $this->authorsLang = loadLang($lang, 'authors');
    }

    public function showPosts()
    {
        $postsToShow = $this->posts->get();

        $view = $this->blade->render('backend/main/layout/posts/posts-list',[
            'lang' => $this->postsLang,
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

    public function showAuthors() {
        $authorsToShow = $this->authors->get();

        $view = $this->blade->render('backend/main/layout/authors/list', [
            'lang' => $this->authorsLang,
            'authors' => $authorsToShow,
            'status' => 'approved',
            'user_id' => $this->userId,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }
}
