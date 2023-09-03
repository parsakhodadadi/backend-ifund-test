<?php

namespace App\Controllers;

use App\DesignPatterns\Proxy\Book\Classes\Book;
use App\Model\Authors;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Subjects;
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
    private $subjects;
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
        $this->subjects = loadModel(Subjects::class);
        $this->authors = loadModel(Authors::class);
        $this->books = loadModel(Books::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->userType = $this->currentUser->user_type;
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $subjectErr = null;
        $errors = $this->request(BookRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $tmpName = $_FILES['photo']['tmp_name'];
            $newFile = 'files' . $_FILES['photo']['name'];
            $uploadProcess = $this->uploadPhoto($tmpName, $newFile);
            if ($uploadProcess) {
                unset($this->request['files']);
                if ($this->userType == 'fulladmin' || $this->userType == 'admin') {
                    $status = 'approved';
                } else {
                    $status = 'disapproved';
                }
                if (current($this->subjects->get(['id' => $this->request['subject_id']]))->category_id == $this->request['category_id']) {
                    unset($this->request['category_id']);
                    $data = [
                        'name' => $this->request['name'],
                        'description' => $this->request['description'],
                        'photo' => $newFile,
                        'user_id' => $this->userId,
                        'subject_id' => (int)$this->request['subject_id'],
                        'author_id' => (int)$this->request['author_id'],
                        'status' => $status,
                        'date' => date("Y/m/d"),
                        'time' => date("h:i:sa"),
                        'edited' => 'no'
                    ];
                    $errorMessage = $this->books->insert($data);
                    if (empty($errorMessage) && empty($subjectErr)) {
                        if ($this->userType == 'fulladmin' || $this->userType == 'admin') {
                            $successMessage = __('books.book-added-suc-admin');
                        } else {
                            $successMessage = __('books.book-added-suc-user');
                        }
                    } else {
                        if (!empty($errorMessage)) {
                            exit($errorMessage);
                        }
                    }
                } else {
                    $subjectErr = 1;
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
            'subjects' => $this->subjects,
            'subject_Err' => $subjectErr,
            'authors' => $this->authors,
            'method' => 'create',
            'action' => '/panel/add-book',
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
        if (current($this->books->get(['id' => $itemId]))->user_id != $this->userId) {
            exit('دسترسی غیر مجاز');
        }
        $successMessage = null;
        $errorMessage = null;
        $subjectErr = null;
        $tmpName = null;
        $fileName = null;
        $uploadNewPhoto = 0;
        $book = current($this->books->get(['id' => $itemId]));

        if (!empty($this->request)) {
            if (!empty($_FILES['photo']['name'])) {
                $tmpName = $_FILES['photo']['tmp_name'];
                $fileName = 'files/' . $_FILES['photo']['name'];
                $uploadNewPhoto = 1;
            } else {
                $this->request['files']['photo']['name'] = $book->photo;
            }
        }
        $errors = $this->request(BookRequest::class, $this->request);

        if (!empty($this->request) && empty($errors)) {
            if ($uploadNewPhoto == 1) {
                if (!$this->uploadPhoto($tmpName, $fileName)) {
                    exit('error uploading photo');
                }
                $this->request['photo'] = $fileName;
            }
            unset($this->request['files']);
            $this->request['edited'] = 'yes';
            if ($this->userType == 'admin' || $this->userType == 'fulladmin') {
                $this->request['status'] = 'approved';
            } else {
                $this->request['status'] = 'disapproved';
            }

            if (current($this->subjects->get(['id' => $this->request['subject_id']]))->category_id != $this->request['category_id']) {
                $subjectErr = 1;
            }
            unset($this->request['category_id']);
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            $errorMessage = $this->books->update(['id' => $itemId], $this->request);
            $book = current($this->books->get(['id' => $itemId]));
            if (empty($errorMessage) && $subjectErr == null) {
                if ($this->userType == 'user') {
                    $successMessage = __('books.updated-suc-user');
                } else {
                    $successMessage = __('books.updated-suc-admin');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/books/create', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'categories' => $this->categories,
            'subjects' => $this->subjects,
            'subject_Err' => $subjectErr,
            'authors' => $this->authors,
            'method' => 'update',
            'action' => '/panel/my-books/edit/' . $itemId,
            'book' => $book,
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function userBooks()
    {
        $userBooks = $this->books->get(['user_id' => $this->userId]);
        $view = $this->blade->render('backend/main/layout/books/user-books', [
            'lang' => $this->lang,
            'books' => $userBooks,
            'user' => $this->currentUser,
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
        $books = $this->books->get();
        $view = $this->blade->render('backend/main/layout/books/management', [
            'lang' => $this->lang,
            'books' => $books,
            'users' => $this->users,
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
        $book = current($this->books->get(['id' => $itemId]));
        if ($this->userType == 'admin') {
            if (current($this->users->get(['id' => $book->user_id]))->user_type == 'admin') {
                exit('دسترسی غیر مجاز');
            }
        }
        $errorMessage = $this->books->update(['id' => $itemId], ['status' => 'approved']);
        if (!empty($errorMessage)) {
            exit('error updating status');
        }
        redirect('/panel/books-management');
    }

    public function delete(int $itemId)
    {
        $book = current($this->books->get(['id' => $itemId]));
        if (current($this->books->get(['id' => $itemId]))->user_id != $this->userId) {
            if ($this->userType == 'user') {
                exit('دسترسی غیرمجاز');
            } elseif ($this->userType == 'admin') {
                if (current($this->users->get(['id' => $book->user_id]))->user_type == 'admin') {
                    exit('دسترسی غیر مجاز');
                }
            }
        }
        $errorMessage = $this->books->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('error deleting field');
        }
        redirect('/panel/books-management');
    }
}
