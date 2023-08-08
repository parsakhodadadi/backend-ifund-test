<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Models\Categories;
use App\Models\Users;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class CategoryController extends controller
{
    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private array $request;
    private $categories;
    private $users;
    private $currentUser;
    private $userId;

    public function __construct()
    {
        $this->request = request();
        $this->categories = loadModel(Categories::class);
        $this->users = loadModel(Users::class);
        $this->userId = $_SESSION['USERID'];
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'categories');
        $this->blade = $this->view()->blade();
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['user_id'] = $_SESSION['USERID'];
            if ($this->currentUser->user_type == 'fulladmin') {
                $this->request['status'] = 'approved';
            } else {
                $this->request['status'] = 'disapproved';
            }
            $errorMessage = $this->categories->insert($this->request);
            if (empty($errorMessage)) {
                $successMessage = __('categories.category-create-success');
            }
        }

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/admin/categories/create',
            'user' => $this->currentUser,
            'method' => 'create',
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function show()
    {
        $categoriesList = $this->categories->get();
        $view = $this->blade->render('backend/main/layout/categories/list', [
            'lang' => $this->lang,
            'categories' => $categoriesList,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function edit(int $itemId)
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(CategoryRequest::class);
        $categoryToEdit = current($this->categories->get(['id' => $itemId]));
        $this->categories = loadModel(categories::class);

        if (!empty($this->request) && empty($errors)) {
            $updateProcess = $this->categories->update(['id' => $categoryToEdit->id], $this->request);
            if ($updateProcess) {
                $categoryToEdit = current($this->categories->get(['id' => $itemId]));
                $successMessage = __('categories.update-success');
            }
        }

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'lang' => $this->lang,
            'category' => $categoryToEdit,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/admin/categories/edit/' . $categoryToEdit->id,
            'user' => $this->currentUser,
            'method' => 'update',
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function delete(int $itemId)
    {
        $errorMessage = $this->categories->delete($itemId);
        if (!empty($errorMessage)) {
            exit('error');
        }
        redirect('/panel/management/categories');
    }
}
