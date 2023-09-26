<?php

namespace App\Controllers;

use App\Models\PodcastComments;
use App\Models\Podcasts;
use App\Models\ReplyPodcastComments;
use App\Models\Users;
use App\Request\CommentRequest;
use Core\System\controller;
use Jenssegers\Blade\Blade;

class PodcastCommentController extends controller
{
    private $blade;
    private $comments;
    private $users;
    private $request;
    private $podcasts;
    private $replyComments;

    public function __construct()
    {
        $this->request = request();
        $this->blade = blade();
        $this->comments = loadModel(PodcastComments::class);
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->users = loadModel(Users::class);
        $this->podcasts = loadModel(Podcasts::class);
        $this->replyComments = loadModel(ReplyPodcastComments::class);
    }

    public function create(int $podcastId)
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(CommentRequest::class);
        $episode = current($this->podcasts->get(['id' => $podcastId]));
        $publisher = current($this->users->get(['id' => $episode->user_id]));
        if (!empty($this->request) && empty($errors)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            if (!empty($_SESSION['USERID'])) {
                $userId = $_SESSION['USERID'];
            } else {
                redirect('/sign-in');
            }
            $currentUser = current($this->users->get(['id' => $userId]));
            $this->request['user_id'] = $userId;
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            if ($currentUser->user_type == 'user') {
                $this->request['status'] = 'disapproved';
            } else {
                $this->request['status'] = 'approved';
            }
            $this->request['podcast_id'] = $podcastId;
            $errorMessage = $this->comments->insert($this->request);
            if (empty($errorMessage)) {
                if ($currentUser->user_type == 'user') {
                    $successMessage = __('comments.post-comment-add-suc-user');
                } else {
                    $successMessage = __('comments.post-comment-add-suc-admin');
                }
            } else {
                exit('error');
            }
        }

        echo $this->blade->render('frontend/main/podcast-single', [
            'view' => $this->blade,
            'episode' => $episode,
            'header' => $this->loadFrontendHeader(),
            'publisher' => $publisher,
            'comments' => $this->comments->get(['podcast_id' => $podcastId]),
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'users' => $this->users,
            'action' => 'podcasts/' . $podcastId . '/add-comment',
            'errors' => $errors,
            'reply' => '0',
            'replyComments' => $this->replyComments,
        ]);
    }

    public function reply(int $podcastId, int $commentId)
    {
        $successMessageReply = null;
        $errorMessageReply = null;
        $errors = $this->request(CommentRequest::class);
        $episode = current($this->podcasts->get(['id' => $podcastId]));
        $publisher = current($this->users->get(['id' => $episode->user_id]));
        if (!empty($this->request) && empty($errors)) {
            if (!empty($_SESSION['USERID'])) {
                $userId = $_SESSION['USERID'];
            } else {
                redirect('/sign-in');
            }
            $currentUser = current($this->users->get(['id' => $userId]));
            $this->request['user_id'] = $userId;
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            if ($currentUser->user_type == 'user') {
                $this->request['status'] = 'disapproved';
            } else {
                $this->request['status'] = 'approved';
            }
            $this->request['podcast_comment_id'] = $commentId;
            $errorMessageReply = $this->replyComments->insert($this->request);
            if (empty($errorMessageReply)) {
                if ($currentUser->user_type == 'user') {
                    $successMessageReply = __('comments.post-comment-add-suc-user');
                } else {
                    $successMessageReply = __('comments.post-comment-add-suc-admin');
                }
            } else {
                exit('error saving data');
            }
        }

        echo $this->blade->render('frontend/main/podcast-single', [
            'view' => $this->blade,
            'episode' => $episode,
            'header' => $this->loadFrontendHeader(),
            'publisher' => $publisher,
            'comments' => $this->comments->get(['podcast_id' => $podcastId]),
            'successMessageReply' => $successMessageReply,
            'errorMessageReply' => $errorMessageReply,
            'users' => $this->users,
            'action' => 'podcasts/' . $podcastId . '/reply/' . $commentId,
            'reply' => $commentId,
            'errors' => $errors,
            'replyComments' => $this->replyComments,
        ]);
    }
}
