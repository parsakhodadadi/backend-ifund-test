<?php

namespace App\Controllers;

use App\Models\Posts;
use App\Models\Users;
use App\Request\PostRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\QueryBuilder;

class PostController extends controller
{
    use QueryBuilder;

    private $request;
    private $lang;
    private object $blade;
    private $queryBuilder;
    private $posts;
    private $users;
    private $userId;
    private $currentUser;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->queryBuilder = $this->queryBuilder();
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'posts');
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->posts = loadModel(Posts::class);

    }

    public function create()
    {
        $errorMessage = null;
        $successMessage = null;
        $errors = null;
//        $errors = $this->request(PostRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if (!empty($_FILES['photo']['name'])) {
                $tmpFile = $_FILES['photo']['tmp_name'];
                $newFile = 'files/' . $_FILES['photo']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);
                if ($result) {
                    if ($this->currentUser->user_type == 'fulladmin') {
                        $status = 'approved';
                    } else {
                        $status = 'disapproved';
                    }
                    $data = [
                        'title' => $this->request['title'],
                        'description' => $this->request['description'],
                        'photo' => $newFile,
                        'user_id' => $this->userId,
                        'status' => $status,
                        'date' => date("Y/m/d"),
                        'time' => date("h:i:sa"),
                        'edited' => 'no',
                    ];
                    $errorMessage = $this->posts->insert($data);
                    if (empty($errorMessage)) {
                        $successMessage = __('posts.added-success');
                    }
                }
            } else {
                $data = [
                    'title' => $this->request['title'],
                    'description' => $this->request['description'],
                    'status' => 'disapproved',
                    'user_id' => $this->userId,
                    'date' => date("Y/m/d"),
                    'time' => date("h:i:sa"),
                ];
                $errorMessage = $this->posts->insert($data);
                if (empty($errorMessage)) {
                    $successMessage = __('posts.added-success');
                }
            }
        }
        $view = $this->blade->render('backend/main/layout/posts/add-post', [
            'lang' => $this->lang,
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'posts' => $this->posts,
            'action' => '/admin/post/create',
            'data' => [],
            'method' => 'create'
        ]);


        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }

    public function editPost(int $itemId)
    {
        $errorMessage = null;
        $successMessage = null;
        $errors = null;
        $newPhoto = null;
        $postToEditData = current($this->posts->get(['id' => $itemId]));
        if (!empty($this->request) && empty($errors)) {
            if (!empty($_FILES['photo']['name'])) {
                //delete current photo
                unlink($postToEditData->photo);
                $tmpFile = $_FILES['photo']['tmp_name'];
                $newFile = 'files/' . $_FILES['photo']['name'];
                $result = move_uploaded_file($tmpFile, $newFile);
                if ($result) {
                    if ($this->currentUser->user_type == 'fulladmin') {
                        $status = 'approved';
                    } else {
                        $status = 'disapproved';
                    }
                    $data = [
                        'title' => $this->request['title'],
                        'description' => $this->request['description'],
                        'photo' => $newFile,
                        'user_id' => $this->userId,
                        'status' => $status,
                        'date' => date("Y/m/d"),
                        'time' => date("h:i:sa"),
                        'edited' => 'yes'
                    ];
                    $updateProcess = $this->posts->update($itemId, $data);
                    if ($updateProcess) {
                        $successMessage = __('posts.updated-success');
                    } else {
                        exit('error');
                    }
                }
            } else {
                if ($this->currentUser->user_type == 'fulladmin') {
                    $status = 'approved';
                } else {
                    $status = 'disapproved';
                }
                unset($this->request['files']);
                $this->request['photo'] = $postToEditData->photo;
                $this->request['status'] = $status;
                $this->request['user_id'] = $this->userId;
                $this->request['date'] = date("Y/m/d");
                $this->request['time'] = date("h:i:sa");
                $this->request['edited'] = 'yes';
                $updateProcess = $this->posts->update($itemId, $this->request);
                if ($updateProcess) {
                    $successMessage = __('posts.updated-success');
                } else {
                    exit('error for updating');
                }
            }
        }

        $view = $this->blade->render('backend/main/layout/posts/add-post', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/admin/posts/edit/' . $itemId,
            'data' => $postToEditData,
            'method' => 'update',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view
        ]);
    }

    public function editPostsStatus()
    {
        $postsToEdit = $this->posts->get();
        $view = $this->blade->render('backend/main/layout/posts/posts-list', [
            'lang' => $this->lang,
            'posts' => $postsToEdit,
            'users' => $this->users,
            'status' => 'disapproved',
        ]);

        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }

    public function approve(int $itemId)
    {
        if (!$this->posts->update($itemId, ['status' => 'approved'])) {
            exit('error');
        }
        redirect('/admin/posts/editPostsStatus');
    }

    public function delete(int $itemId)
    {
        $errorMessage = $this->posts->delete($itemId);
        if (!empty($errorMessage)) {
            exit('errorMessage');
        }
        redirect('/admin/posts/editPostsStatus');
    }

    public function uploadFile() {

    }

}