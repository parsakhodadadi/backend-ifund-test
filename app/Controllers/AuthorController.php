<?php

namespace App\Controllers;

use App\Model\Authors;
use App\Models\Users;
use App\Request\AuthorRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class AuthorController extends controller
{
    private $request;
    private $authors;
    private object $blade;
    private $userId;
    private $lang;
    private $currentUser;
    private $users;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'authors');
        $this->authors = loadModel(Authors::class);
    }

    public function create()
    {
        $errorMessage = null;
        $successMessage = null;
        $errors = $this->request(AuthorRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type == 'fulladmin') {
                $status = 'approved';
            } else {
                $status = 'disapproved';
            }
            if (!empty($_FILES['photo']['name'])) {
                $tmpFile = $_FILES['photo']['tmp_name'];
                $newFile = 'files/' . $_FILES['photo']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);
                if ($result) {
                    unset($this->request['files']);
                    $this->request['photo'] = $newFile;
                    $this->request['status'] = $status;
                    $this->request['user_id'] = $this->userId;

                    $errorMessage = $this->authors->insert($this->request);
                    if (empty($errorMessage)) {
                        if ($this->currentUser->user_type == 'admin') {
                            $successMessage = __('authors.added-suc-admin');
                        } else {
                            $successMessage = __('authors.added-suc-fulladmin');
                        }
                    } else {
                        exit('error saving data to database');
                    }
                }
            } else {
                unset($this->request['files']);
                $this->request['status'] = $status;
                $this->request['user_id'] = $this->userId;

                $errorMessage = $this->authors->insert($this->request);
                if (empty($errorMessage)) {
                    if ($this->currentUser->user_type == 'admin') {
                        $successMessage = __('authors.added-suc-admin');
                    } else {
                        $successMessage = __('authors.added-suc-fulladmin');
                    }
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/authors/create', [
            'lang' => $this->lang,
            'errorMessage' => $errorMessage,
            'successMessage' => $successMessage,
            'action' => '/panel/add-author',
            'method' => 'create',
            'errors' => $errors,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function adminAuthors()
    {
        $authors = $this->authors->get(['user_id' => $this->userId]);
        $view = $this->blade->render('backend/main/layout/authors/admin-authors', [
            'lang' => $this->lang,
            'authors' => $authors,
            'status' => 'disapproved',
            'users' => $this->users,
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
        $authorsToShow = $this->authors->get();
        $view = $this->blade->render('backend/main/layout/authors/management', [
            'lang' => $this->lang,
            'authors' => $authorsToShow,
            'status' => 'disapproved',
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
        $authorToApprove = current($this->authors->get(['id' => $itemId]));
        $approveProcess = $this->authors->update(['id' => $authorToApprove->id], ['status' => 'approved']);
        if ($approveProcess) {
            redirect('/panel/authors-management');
        } else {
            exit('error');
        }
    }

    public function delete(int $itemId)
    {
        $errorMessage = $this->authors->delete(['id' => $itemId]);
        if (empty($errorMessage)) {
            redirect('/panel/authors-management');
        } else {
            exit('error');
        }
    }

    public function edit(int $itemId)
    {
        $errorMessage = null;
        $successMessage = null;
        $errors = $this->request(AuthorRequest::class);
        $author = current($this->authors->get(['id' => $itemId]));
        if (!empty($this->request) && empty($errorMessage)) {
            if ($this->currentUser->user_type == 'fulladmin') {
                $status = 'approved';
            } else {
                $status = 'disapproved';
            }
            if (!empty($_FILES['photo']['name'])) {
                $tmpFile = $_FILES['photo']['tmp_name'];
                $newFile = 'files/' . $_FILES['photo']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);
                if ($result) {
                    unlink($author->photo);
                    unset($this->request['files']);
                    $this->request['photo'] = $newFile;
                    $this->request['status'] = $status;
                    $errorMessage = $this->authors->update(['id' => $itemId], $this->request);
                    if (empty($errorMessage)) {
                        $author = current($this->authors->get(['id' => $itemId]));
                        if ($this->currentUser->user_type == 'admin') {
                            $successMessage = __('authors.updated-suc-admin');
                        } else {
                            $successMessage = __('authors.updated-suc-fulladmin');
                        }
                    } else {
                        exit('error saving data to database');
                    }
                }
            } else {
                unset($this->request['files']);
                $this->request['photo'] = $author->photo;
                $this->request['status'] = $status;
                $errorMessage = $this->authors->update(['id' => $itemId], $this->request);
                if (empty($errorMessage)) {
                    $author = current($this->authors->get(['id' => $itemId]));
                    if ($this->currentUser->user_type == 'admin') {
                        $successMessage = __('authors.updated-suc-admin');
                    } else {
                        $successMessage = __('authors.updated-suc-fulladmin');
                    }
                } else {
                    exit('error saving data to database');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/authors/create', [
            'lang' => $this->lang,
            'errorMessage' => $errorMessage,
            'successMessage' => $successMessage,
            'action' => '/panel/authors-management/edit/' . $itemId,
            'author' => $author,
            'method' => 'update',
            'error' => $errors,
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }
}
