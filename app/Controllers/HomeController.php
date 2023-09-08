<?php

namespace App\Controllers;

use App\Model\Authors;
use App\Models\Categories;
use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\Users;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class HomeController extends controller
{
    private object $blade;
    private $posts;
    private $users;
    private $userId;
    private $postsLang;
    private $authorsLang;
    private $authors;
    private $categories;
    private $postCats;

    public function __construct()
    {
        $this->blade = $this->view()->blade();
        $this->posts = loadModel(Posts::class);
        $this->users = loadModel(Users::class);
        $this->authors = loadModel(Authors::class);
        $this->categories = loadModel(Categories::class);
        if (isset($_SESSION['USERID'])) {
            $this->userId = $_SESSION['USERID'];
        }
        $lang = ConfigHelper::getConfig('default-language');
        $this->postsLang = loadLang($lang, 'posts');
        $this->authorsLang = loadLang($lang, 'authors');
        $this->postCats = loadModel(PostCategories::class);
    }

    public function frontEnd()
    {
        echo $this->blade->render('frontend/main/main', [
            'view' => $this->blade,
            'posts' => $this->loadFrontPosts(),
        ]);
    }

    public function showPosts()
    {
        $postsToShow = $this->posts->get();
        $view = $this->blade->render('backend/main/layout/posts/list', [
            'lang' => $this->postsLang,
            'posts' => $postsToShow,
            'users' => $this->users,
            'status' => 'approved',
            'user_id' => $this->userId,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function showAuthors()
    {
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
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function postSingle(int $itemId)
    {
        $post = current($this->posts->get(['id' => $itemId]));
        $user = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->postCats->get(['id' => $post->post_category_id]));
        echo $this->blade->render('frontend/main/post', [
            'view' => $this->blade,
            'post' => $post,
            'user' => $user,
            'category' => $category,
        ]);
    }
}
