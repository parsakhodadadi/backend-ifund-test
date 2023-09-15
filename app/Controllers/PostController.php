<?php

namespace App\Controllers;

use App\Models\LikedPosts;
use App\Models\PostCategories;
use App\Models\PostComments;
use App\Models\Posts;
use App\Models\ReplyPostComments;
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
    private $comments;
    private $replyComments;
    private $likedPosts;

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
        $this->comments = loadModel(PostComments::class);
        $this->replyComments = loadModel(ReplyPostComments::class);
        $this->likedPosts = loadModel(LikedPosts::class);
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
                } else {
                    exit($errorMessage);
                }
            }
        }

        echo $this->blade->render('backend/main/layout/posts/create', [
            'lang' => $this->lang,
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'posts' => $this->posts,
            'action' => '/panel/add-post',
            'post' => [],
            'method' => 'create',
            'categories' => $this->categories->get(),
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function edit(int $itemId)
    {
        if (current($this->posts->get(['id' => $itemId]))->user_id != $this->userId) {
            exit('invalid access');
        }
        $post = current($this->posts->get(['id' => $itemId]));
        $errorMessage = null;
        $successMessage = null;
        $tmpName = null;
        $fileName = null;
        $uploadNewPhoto = 0;

        if (!empty($this->request)) {
            if (!empty($_FILES['photo']['name'])) {
                $tmpName = $_FILES['photo']['tmp_name'];
                $fileName = 'files/' . $_FILES['photo']['name'];
                $uploadNewPhoto = 1;
            } else {
                $this->request['files']['photo']['name'] = $post->photo;
            }
        }

        $errors = $this->request(PostRequest::class, $this->request);

        if (!empty($this->request) && empty($errors)) {
            if ($this->currentUser->user_type != 'admin') {
                $status = 'approved';
            } else {
                $status = 'disapproved';
            }

            if ($uploadNewPhoto == 1) {
                if (!$this->uploadPhoto($tmpName, $fileName)) {
                    exit('error uploading photo');
                }
                $this->request['photo'] = $fileName;
            }

            unset($this->request['files']);
            $this->request['user_id'] = $this->userId;
            $this->request['status'] = $status;
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            $this->request['edited'] = 'yes';
            $errorMessage = $this->posts->update(['id' => $itemId], $this->request);
            if (empty($errorMessage)) {
                $post = current($this->posts->get(['id' => $itemId]));
                if ($this->currentUser->user_type == 'admin') {
                    $successMessage = __('posts.updated-success-admin');
                } else {
                    $successMessage = __('posts.updated-success-fulladmin');
                }
            } else {
                exit($errorMessage);
            }
        }

        echo $this->blade->render('backend/main/layout/posts/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/my-posts/edit/' . $itemId,
            'post' => $post,
            'method' => 'update',
            'categories' => $this->categories->get(),
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function adminPosts()
    {
        $posts = $this->posts->get(['user_id' => $this->userId]);
        echo $this->blade->render('backend/main/layout/posts/admin-posts', [
            'lang' => $this->lang,
            'posts' => array_reverse($posts),
            'users' => $this->users,
            'view' => $this->blade,
            'postsCount' => count($posts),
            'categories' => $this->categories,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function management()
    {
        $posts = $this->posts->get();
        echo $this->blade->render('backend/main/layout/posts/management', [
            'lang' => $this->lang,
            'posts' => array_reverse($posts),
            'users' => $this->users,
            'view' => $this->blade,
            'postsCount' => count($posts),
            'categories' => $this->categories,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function showSingle(int $postId)
    {
        $liked = false;
        if (!empty(current($this->likedPosts->get(['post_id' => $postId, 'user_id' => $this->userId])))) {
            $liked = true;
        }
        $post = current($this->posts->get(['id' => $postId]));
        $user = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->categories->get(['id' => $post->post_category_id]));
        echo $this->blade->render('frontend/main/post', [
            'view' => $this->blade,
            'post' => $post,
            'comments' => $this->comments->get(['post_id' => $postId, 'status' => 'approved']),
            'replyComments' => $this->replyComments,
            'liked' => $liked,
            'ownerUser' => $user,
            'category' => $category,
            'users' => $this->users,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function like(int $itemId)
    {
        $route = '/posts/' . $itemId . '/add-comment';
        $post = current($this->posts->get(['id' => $itemId]));
        if (empty(current($this->likedPosts->get(['user_id' => $this->userId, 'post_id' => $itemId])))) {
            $errorMessageLikesTable = $this->likedPosts->insert(['user_id' => $this->userId, 'post_id' => $itemId]);
            $errorMessagePostsTable = $this->posts->update(['id' => $itemId], ['likes' => $post->likes + 1]);
            if (empty($errorMessageLikesTable) && empty($errorMessagePostsTable)) {
                redirect($route);
            } else {
                exit('error');
            }
        } else {
            $errorMessageLikesTable = $this->likedPosts->delete(['user_id' => $this->userId, 'post_id' => $itemId]);
            $errorMessagePostsTable = $this->posts->update(['id' => $itemId], ['likes' => $post->likes - 1]);
            if (empty($errorMessagePostsTable) && empty($errorMessageLikesTable)) {
                redirect($route);
            } else {
                exit('error');
            }
        }
    }

    public function approve(int $itemId)
    {
        if (current($this->posts->get(['id' => $itemId]))->status == 'approved') {
            if (!empty($this->posts->update(['id' => $itemId], ['status' => 'disapproved']))) {
                exit('error');
            }
        } else {
            if (!empty($this->posts->update(['id' => $itemId], ['status' => 'approved']))) {
                exit('error');
            }
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