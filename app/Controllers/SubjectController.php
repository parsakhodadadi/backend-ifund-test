<?php

namespace App\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Subjects;
use App\Models\Users;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

use function Sodium\compare;

class SubjectController extends controller
{
    private object $blade;
    private $userId;
    private $users;
    private $subjects;
    private $categories;
    private $request;
    private $lang;
    private $currentUser;
    private $books;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->subjects = loadModel(Subjects::class);
        $this->categories = loadModel(Categories::class);
        $this->books = loadModel(Books::class);
        $this->lang = loadLang(ConfigHelper::getConfig('default-language'), 'categories');
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
    }

    public function create(int $categoryId)
    {
        $successMessage = null;
        $errorMessage = null;
        $category = current($this->categories->get(['id' => $categoryId]));
        if ($category->user_id != $this->userId || $category->status == 'disapproved') {
            exit('Access denied');
        }
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type == 'fulladmin') {
                $this->request['status'] = 'approved';
            } else {
                $this->request['status'] = 'disapproved';
            }
            $this->request['category_id'] = $categoryId;
            $errorMessage = $this->subjects->insert($this->request);
            if (empty($errorMessage)) {
                if ($this->currentUser->user_type == 'admin') {
                    $successMessage = __('categories.subject-add-suc-admin');
                } else {
                    $successMessage = __('categories.subject-add-suc-fulladmin');
                }
            } else {
                exit('error saving data to database');
            }
        }

        $view = $this->blade->render('backend/main/layout/subjects/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/my-categories/' . $categoryId . '/add-subject',
            'errors' => $errors,
            'method' => 'create',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function edit(int $categoryId, int $subjectId)
    {
        $successMessage = null;
        $errorMessage = null;
        $category = current($this->categories->get(['id' => $categoryId]));
        $subject = current($this->subjects->get(['id' => $subjectId]));
        if (empty($category) || empty($subject)) {
            exit('invalid category or subject');
        }
        if ($category->user_id != $this->userId) {
            exit('Invalid Access');
        }
        if ($subject->category_id != $category->id) {
            exit('invalid subject');
        }
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type == 'fulladmin') {
                $this->request['status'] = 'approved';
            } else {
                $this->request['status'] = 'disapproved';
            }
            $errorMessage = $this->subjects->update(['id' => $subjectId], $this->request);
            if (empty($errorMessage)) {
                $subject = current($this->subjects->get(['id' => $subjectId]));
                if ($this->currentUser->user_type == 'admin') {
                    $successMessage = __('categories.subject-update-suc-admin');
                } else {
                    $successMessage = __('categories.subject-update-suc-fulladmin');
                }
            } else {
                exit('error saving data to database');
            }
        }

        $view = $this->blade->render('backend/main/layout/subjects/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'category' => $category,
            'subject' => $subject,
            'user' => $this->currentUser,
            'action' => '/panel/my-categories/' . $categoryId . '/subjects/edit/' . $subjectId,
            'errors' => $errors,
            'method' => 'update',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function userSubjects(int $categoryId)
    {
        $subjects = $this->subjects->get(['category_id' => $categoryId]);
        $category = current($this->categories->get(['id' => $categoryId]));
        if ($category->status == 'disapproved') {
            exit('Invalid Access');
        }
        $view = $this->blade->render('backend/main/layout/subjects/user-subjects', [
            'lang' => $this->lang,
            'subjects' => $subjects,
            'category' => $category,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function management(int $categoryId)
    {
        $subjects = $this->subjects->get(['category_id' => $categoryId]);
        $category = current($this->categories->get(['id' => $categoryId]));
        if ($category->status == 'disapproved') {
            exit('Invalid Access');
        }
        $view = $this->blade->render('backend/main/layout/subjects/management', [
            'lang' => $this->lang,
            'subjects' => $subjects,
            'category' => $category,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function delete(int $categoryId, int $subjectId)
    {
        $subjectBooks = $this->books->get(['subject_id' => $subjectId]);
        $subject = current($this->subjects->get(['id' => $subjectId]));
        $category = current($this->categories->get(['id' => $categoryId]));
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/my-categories/' . $categoryId . '/subjects/delete/' . $subjectId) {
            $route = '/panel/my-categories/' . $categoryId . '/subjects';
            if ($category->user_id != $this->userId) {
                exit('Invalid Access');
            }
         } else {
            $route = '/panel/categories-management/' . $categoryId . '/subjects';
        }
        if (empty($subject) || empty($category)) {
            exit('invalid subject or category');
        }
        if ($subject->category_id != $categoryId) {
            exit('invalid access');
        }
        if (!empty($subjectBooks)) {
            $errorMessageBooks = $this->books->delete(['subject_id' => $subjectId]);
            if (!empty($errorMessageBooks)) {
                exit('error deleting book from database');
            }
        }
        $errorMessage = $this->subjects->delete(['id' => $subjectId]);
        if (!empty($errorMessage)) {
            exit('error deleting subject from database');
        }
        redirect($route);
    }
}
