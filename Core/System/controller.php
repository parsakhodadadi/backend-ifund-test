<?php

/**
 *description
 *
 * created by:Parsa
 * email:parsakhodadadi2003@gmail.com
 * who:
 * updated at:
 *
 */

namespace Core\System;

use App\Exception\QueryBuilderException;
use App\Model\Authors;
use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Categories;
use Core\System\Helpers\ConfigHelper;


class controller
{
    private $users;
    private $userId = null;
    private $currentUser = null;
    private $categories = null;

    public function __construct()
    {
    }

    public function loadController($class)
    {
        return new $class();
    }

    public function validation()
    {
        return new Validation();
    }

    public static function view()
    {
        return new View();
    }

    public function security()
    {
        return new \Security();
    }

    public function event()
    {
        return new \Event();
    }

    public function middleware(array $middlewares = [])
    {
        foreach ($middlewares as $middleware) {
            $eachMiddleware = new $middleware();
            $eachMiddleware->boot();
        }
    }

    public function request($request, $data = [])
    {
        if (empty($data)) {
            $data = \request();
        }
        $request = new $request();
        return $request->boot($data);
    }

    public function queryBuilderException()
    {
        return new QueryBuilderException();
    }

    public function loadNavigation()
    {
        $users = loadModel(Users::class);
        $currentUser = null;
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        if (isset($_SESSION['USERID'])) {
            $currentUser = current($users->get(['id' => $_SESSION['USERID']]));
        }
        $categories = loadModel(Categories::class);
        $authors = loadModel(Authors::class);
        return $this->view()->blade()->render('backend/main/layout/navigation', [
            'categories' => $categories->get(),
            'authors' => $authors->get(),
            'user' => $currentUser,
        ]);
    }

    public function loadBackendHeader()
    {
        $users = loadModel(Users::class);
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $lang = loadLang(ConfigHelper::getConfig('default-language'), 'back-header');
        $currentUser = current($users->get(['id' => $_SESSION['USERID']]));
        return $this->view()->blade()->render('backend/main/layout/header', [
            'user' => $currentUser,
            'lang' => $lang,
        ]);
    }

    public function loadFrontPosts()
    {
//        $count = 0;
        $users = loadModel(Users::class);
        $posts = loadModel(Posts::class)->get();
        $categories = loadModel(PostCategories::class);
//        foreach ($posts as $post) {
//            $count ++;
//        }
//        $count -= 3;
//        $newCount = 0;
//        $otherPosts = [];
//        foreach ($posts as $post) {
//            $newCount ++;
//            if ($newCount <= $count) {
//                $otherPosts[] = $post;
//            }
//        }
        return $this->view()->blade()->render('frontend/main/posts', [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
        ]);
    }

    public function loadFrontendHeader()
    {
        echo $this->view()->blade()->render('frontend/main/layout/header', [
            'view' => $this->view()->blade(),
            'lang' => loadLang(ConfigHelper::getConfig('default-language'), 'front-header')
        ]);
    }

    public function uploadPhoto($tmpFile, $fileName)
    {
        if (!move_uploaded_file($tmpFile, $fileName)) {
            return false;
        }
        return true;
    }
}
