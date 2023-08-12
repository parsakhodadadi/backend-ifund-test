<?php

namespace App\Controllers;

use App\DesignPatterns\Proxy\Book\Classes\Book;
use App\Model\Authors;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Subcategories;
use App\Models\Users;
use App\Request\BookRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class BookController extends controller
{

    private object $blade;
    private $userId;
    private $books;
    private $request;
    private $lang;
    private $users;
    private $categories;
    private $sub_categories;
    private $authors;
    private $currentUser;
    private $userType;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];
        $this->lang = loadLang(ConfigHelper::getConfig('default-language'), 'books');
        $this->users = loadModel(Users::class);
        $this->categories = loadModel(Categories::class);
        $this->sub_categories = loadModel(Subcategories::class);
        $this->authors = loadModel(Authors::class);
        $this->books = loadModel(Books::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->userType = $this->currentUser->user_type;
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $subcategoryErr = null;
        $errors = $this->request(BookRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $tmpName = $_FILES['photo']['tmp_name'];
            $newFile = $_FILES['photo']['name'];
            $uploadProcess = $this->uploadPhoto($tmpName, $newFile);
            if ($uploadProcess) {
                unset($this->request['files']);
                if ($this->userType == 'fulladmin' || $this->userType == 'admin') {
                    $status = 'approved';
                } else {
                    $status = 'disapproved';
                }

                if (current($this->sub_categories->get(['id' => $this->request['sub_category_id']]))->category_id == $this->request['category_id']) {
                    unset($this->request['category_id']);
                    $data = [
                        'name' => $this->request['name'],
                        'description' => $this->request['description'],
                        'photo' => $newFile,
                        'user_id' => $this->userId,
                        'sub_category_id' => (int)$this->request['sub_category_id'],
                        'author_id' => (int)$this->request['author_id'],
                        'status' => $status,
                    ];
                    $errorMessage = $this->books->insert($data);
                    if (empty($errorMessage) && empty($subcategoryErr)) {
                        if ($this->userType == 'fulladmin' || $this->userType == 'admin') {
                            $successMessage = __('books.book-added-suc-admin');
                        } else {
                            $successMessage = __('books.book-added-suc-user');
                        }
                    } else if (!empty($errorMessage)) {
                        exit($errorMessage);
                    }
                } else {
                    $subcategoryErr = 1;
                }
            } else {
                exit('error uploading photo.');
            }
        }

        $view = $this->blade->render('backend/main/layout/books/create', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'categories' => $this->categories,
            'sub_categories' => $this->sub_categories,
            'sub_category_Err' => $subcategoryErr,
            'authors' => $this->authors,
            'method' => 'create',
            'action' => '/panel/books/create',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }


}