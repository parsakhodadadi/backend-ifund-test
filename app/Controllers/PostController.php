<?php

namespace App\Controllers;

use App\Models\PostCategories;
use App\Models\Posts;
use App\Models\Users;
use App\Request\PostRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class PostController extends controller
{
    private $request;
    private $lang;
    private object $blade;
    private $posts;
    private $users;
    private $userId;
    private $currentUser;
    private $categories;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'posts');
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->posts = loadModel(Posts::class);
        $this->categories = loadModel(PostCategories::class);
    }

    public function create()
    {
        $errorMessage = null;
        $successMessage = null;
        $errors = $this->request(PostRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type == 'fulladmin') {
                $status = 'approved';
            } else {
                $status = 'disapproved';
            }

            $tmpFile = $_FILES['photo']['tmp_name'];
            $newFile = 'files/' . $_FILES['photo']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
            if ($result) {
                $this->request['photo'] = $newFile;
                $this->request['user_id'] = $this->userId;
                $this->request['status'] = $status;
                $this->request['date'] = date("Y/m/d");
                $this->request['time'] = date("h:i:sa");
                $this->request['edited'] = 'no';
                unset($this->request['files']);
                $errorMessage = $this->posts->insert($this->request);
                if (empty($errorMessage)) {
                    if ($this->currentUser->user_type == 'admin') {
                        $successMessage = __('posts.add-suc-admin');
                    } else {
                        $successMessage = __('posts.add-suc-fulladmin');
                    }
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/posts/create', [
            'lang' => $this->lang,
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'posts' => $this->posts,
            'action' => '/panel/add-post',
            'data' => [],
            'method' => 'create',
            'categories' => $this->categories->get(),
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
        $errorMessage = null;
        $successMessage = null;
        $errors = $this->request(PostRequest::class);
        $post = current($this->posts->get(['id' => $itemId]));
        if (!empty($this->request) && empty($errors)) {
            if (!empty($_FILES['photo']['name'])) {
                //delete current photo
                $tmpFile = $_FILES['photo']['tmp_name'];
                $newFile = 'files/' . $_FILES['photo']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);
                if ($result) {
                    if ($this->currentUser->user_type == 'fulladmin') {
                        $status = 'approved';
                    } else {
                        $status = 'disapproved';
                    }
                    unset($this->request['files']);
                    $this->request['photo'] = $newFile;
                    $this->request['user_id'] = $this->userId;
                    $this->request['status'] = $status;
                    $this->request['date'] = date("Y/m/d");
                    $this->request['time'] = date("h:i:sa");
                    $this->request['edited'] = 'yes';
                    $updateProcess = $this->posts->update(['id' => $itemId], $this->request);
                    unlink($post->photo);
                    if ($updateProcess) {
                        $post = current($this->posts->get(['id' => $itemId]));
                        if ($this->currentUser->user_type == 'admin') {
                            $successMessage = __('posts.updated-success-admin');
                        } else {
                            $successMessage = __('posts.updated-success-fulladmin');
                        }
                    } else {
                        exit('error');
                    }
                }
            } else {
                if ($this->currentUser->user_type != 'user') {
                    $status = 'approved';
                } else {
                    $status = 'disapproved';
                }
                unset($this->request['files']);
                $this->request['photo'] = $post->photo;
                $this->request['status'] = $status;
                $this->request['user_id'] = $this->userId;
                $this->request['date'] = date("Y/m/d");
                $this->request['time'] = date("h:i:sa");
                $this->request['edited'] = 'yes';
                $updateProcess = $this->posts->update(['id' => $itemId], $this->request);
                if ($updateProcess) {
                    $post = current($this->posts->get(['id' => $itemId]));
                    if ($this->currentUser->user_type == 'admin') {
                        $successMessage = __('posts.updated-success-admin');
                    } else {
                        $successMessage = __('posts.updated-success-fulladmin');
                    }
                } else {
                    exit('error for updating');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/posts/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/my-posts/edit/' . $itemId,
            'data' => $post,
            'method' => 'update',
            'categories' => $this->categories->get(),
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
            'header' => $this->loadHeader(),
        ]);
    }

    public function adminPosts()
    {
        $posts = $this->posts->get(['user_id' => $this->userId]);
        $view = $this->blade->render('backend/main/layout/posts/admin-posts', [
            'lang' => $this->lang,
            'posts' => $posts,
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
        $postsToEdit = $this->posts->get();
        $view = $this->blade->render('backend/main/layout/posts/management', [
            'lang' => $this->lang,
            'posts' => $postsToEdit,
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
        if (!$this->posts->update(['id' => $itemId], ['status' => 'approved'])) {
            exit('error');
        }
        redirect('/panel/posts-management');
    }

    public function delete(int $itemId)
    {
        $errorMessage = $this->posts->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('errorMessage');
        }
        redirect('/panel/posts-management');
    }

    public function remove(int $itemId)
    {
        $errorMessage = $this->posts->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('errorMessage');
        }
        redirect('/panel/my-posts');
    }
}