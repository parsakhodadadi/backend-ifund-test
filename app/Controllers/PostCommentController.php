<?php

namespace App\Controllers;

use App\Models\PostCategories;
use App\Models\PostComments;
use App\Models\Posts;
use App\Models\ReplyPostComments;
use App\Models\Users;
use App\Request\CommentRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class PostCommentController extends controller
{
    private $request;
    private $blade;
    private $comments;
    private $userId;
    private $users;
    private $currentUser;
    private $lang;
    private $posts;
    private $categories;
    private $replyComments;

    public function __construct()
    {
        $this->blade = blade();
        $this->request = request();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['USERID'])) {
            $this->userId = $_SESSION['USERID'];
        }
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->comments = loadModel(PostComments::class);
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'comments');
        $this->posts = loadModel(Posts::class);
        $this->categories = loadModel(PostCategories::class);
        $this->replyComments = loadModel(ReplyPostComments::class);
    }

    public function create(int $postId)
    {
        $successMessage = null;
        $errorMessage = null;
        $post = current($this->posts->get(['id' => $postId]));
        $ownerUser = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->categories->get(['id' => $post->post_category_id]));
        $errors = $this->request(CommentRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['post_id'] = $post->id;
            $this->request['user_id'] = $this->userId;
            if ($this->currentUser->user_type == 'user') {
                $this->request['status'] = 'disapproved';
            } else {
                $this->request['status'] = 'approved';
            }
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            $errorMessage = $this->comments->insert($this->request);
            if (empty($errorMessage)) {
                if ($this->currentUser->user_type == 'user') {
                    $successMessage = __('comments.post-comment-add-suc-user');
                } else {
                    $successMessage = __('comments.post-comment-add-suc-admin');
                }
            } else {
                exit($errorMessage);
            }
        }
        echo $this->blade->render('frontend/main/post', [
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'view' => $this->blade,
            'post' => $post,
            'ownerUser' => $ownerUser,
            'category' => $category,
            'comments' => $this->comments->get(['post_id' => $postId, 'status' => 'approved']),
            'users' => $this->users,
            'replyComments' => $this->replyComments,
            'action' => 'posts/' . $post->id . '/add-comment',
        ]);
    }

    public function reply(int $postId, int $commentId)
    {
        $successMessage = null;
        $errorMessage = null;
        $comment = current($this->comments->get(['id' => $commentId]));
        $post = current($this->posts->get(['id' => $postId]));
        $ownerUser = current($this->users->get(['id' => $post->user_id]));
        $category = current($this->categories->get(['id' => $post->post_category_id]));
        if (empty($comment)) {
            exit('invalid comment');
        }
        $errors = $this->request(CommentRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['post_comment_id'] = $comment->id;
            $this->request['user_id'] = $this->userId;
            if ($this->currentUser->user_type == 'user') {
                $this->request['status'] = 'disapproved';
            } else {
                $this->request['status'] = 'approved';
            }
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            $errorMessage = $this->replyComments->insert($this->request);
            if (empty($errorMessage)) {
                if ($this->currentUser->user_type == 'user') {
                    $successMessage = __('comments.post-comment-add-suc-user');
                } else {
                    $successMessage = __('comments.post-comment-add-suc-admin');
                }
            } else {
                exit($errorMessage);
            }
        }
        echo $this->blade->render('frontend/main/post', [
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'view' => $this->blade,
            'post' => $post,
            'ownerUser' => $ownerUser,
            'category' => $category,
            'comments' => $this->comments->get(['status' => 'approved']),
            'users' => $this->users,
            'replyComments' => $this->replyComments,
            'action' => 'posts/' . $post->id . '/reply/' . $commentId,
        ]);
    }
}