<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\PostCategories;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class PostCategoriesController extends controller
{
    private $blade;
    private $categories;
    private $userId;
    private $users;
    private $currentUser;
    private $request;
    private $lang;

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
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'categories');
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

        $view = $this->blade->render('backend/main/layout/post-categories/create', [
            'successMessage' => $successMessage,
            'errors' => $errors,
            'lang' => $this->lang,
            'method' => 'create',
            'action' => '/panel/add-post-category',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);

    }

}