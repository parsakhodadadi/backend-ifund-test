<?php

namespace App\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Subjects;
use App\Models\Users;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class CategoryController extends controller
{
    private $lang;
    private object $blade;
    private array $request;
    private $categories;
    private $users;
    private $currentUser;
    private $userId;
    private $subjects;
    private $books;

    public function __construct()
    {
        $this->request = request();
        $this->categories = loadModel(Categories::class);
        $this->users = loadModel(Users::class);
        $this->subjects = loadModel(Subjects::class);
        $this->books = loadModel(Books::class);
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
            $this->request['user_id'] = $this->userId;
            if ($this->currentUser->user_type == 'fulladmin') {
                $this->request['status'] = 'approved';
            } else {
                $this->request['status'] = 'disapproved';
            }
            $errorMessage = $this->categories->insert($this->request);
            if (empty($errorMessage)) {
                if ($this->currentUser->user_type == 'admin') {
                    $successMessage = __('categories.add-suc-admin');
                } else {
                    $successMessage = __('categories.add-suc-fulladmin');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/add-category',
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

    public function userCategories()
    {
        $categories = $this->categories->get(['user_id' => $this->userId]);
        $view = $this->blade->render('backend/main/layout/categories/user-categories', [
            'lang' => $this->lang,
            'categories' => $categories,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function management()
    {
        $categories = $this->categories->get();
        $view = $this->blade->render('backend/main/layout/categories/management', [
            'lang' => $this->lang,
            'categories' => $categories,
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
        $category = current($this->categories->get(['id' => $itemId]));
        if ($category->user_id != $this->userId) {
            exit('Invalid Access');
        }
        $this->categories = loadModel(Categories::class);
        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type == 'admin') {
                $this->request['status'] = 'disapproved';
            } else {
                $this->request['status'] = 'approved';
            }
            $errorMessage = $this->categories->update(['id' => $category->id], $this->request);
            if (empty($errorMessage)) {
                $category = current($this->categories->get(['id' => $itemId]));
                if ($this->currentUser->user_type == 'admin') {
                    $successMessage = __('categories.update-suc-admin');
                } else {
                    $successMessage = __('categories.update-suc-fulladmin');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'lang' => $this->lang,
            'category' => $category,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/my-categories/edit/' . $itemId,
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

    public function approve(int $itemId)
    {
        $errorMessage = $this->categories->update(['id' => $itemId], ['status' => 'approved']);
        if (!empty($errorMessage)) {
            exit('error editing status');
        }
        redirect('/panel/categories-management');
    }

    public function delete(int $itemId)
    {
        $category = current($this->categories->get(['id' => $itemId]));
        $categorySubjects = $this->subjects->get(['category_id' => $itemId]);
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/my-categories/delete/' . $itemId) {
            $route = '/panel/my-categories';
            if ($category->user_id != $this->userId) {
                exit('Access denied');
            }
        } else {
            $route = '/panel/categories-management';
        }
        if (!empty($categorySubjects)) {
            foreach ($categorySubjects as $categorySubject) {
                if (!empty($this->books->get(['subject_id' => $categorySubject->id]))) {
                    $errorMessageBooks = $this->books->delete(['subject_id' => $categorySubject->id]);
                    if (!empty($errorMessageBooks)) {
                        exit('error deleting related books from database');
                    }
                }
            }
            $errorMessageSub = $this->subjects->delete(['category_id' => $itemId]);
            if (!empty($errorMessageSub)) {
                exit('error deleting related subjects from database');
            }
        }
        $this->subjects->delete(['category_id' => $itemId]);
        $errorMessage = $this->categories->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('error deleting category from database');
        }
        redirect($route);
    }
}
