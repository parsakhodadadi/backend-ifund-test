<?php

namespace App\Controllers;

use App\Models\Posts;
use App\Models\Users;
use App\Models\PostCategories;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class PostCategoryController extends controller
{
    private $blade;
    private $categories;
    private $userId;
    private $users;
    private $currentUser;
    private $request;
    private $lang;
    private $posts;

    public function __construct() {
        $this->request = request();
        $this->blade = $this->view()->blade();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->users = loadModel(Users::class);
        $this->userId = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->categories = loadModel(PostCategories::class);
        $this->posts = loadModel(Posts::class);
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'post-categories');
    }

    public function create() {
        $successMessage = null;
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['user_id'] = $this->userId;
            $errorMessage = $this->categories->insert($this->request);
            if (empty($errorMessage)) {
                $successMessage = __('categories.add-suc-fulladmin');
            }
        }

        echo $this->blade->render('backend/main/layout/post-categories/create', [
            'successMessage' => $successMessage,
            'errors' => $errors,
            'lang' => $this->lang,
            'method' => 'create',
            'action' => '/panel/add-post-category',
            'view' => $this->blade,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function show()
    {
        echo $this->blade->render('backend/main/layout/post-categories/list', [
            'posts' => $this->posts,
            'categories' => $this->categories->get(),
            'lang' => $this->lang,
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

}