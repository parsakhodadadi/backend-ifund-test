<?php

namespace App\Controllers;

use App\Models\PodcastComments;
use App\Models\Podcasts;
use App\Models\ReplyPodcastComments;
use App\Models\Users;
use App\Request\CommentRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Jenssegers\Blade\Blade;

class PodcastCommentController extends controller
{
    private $blade;
    private $comments;
    private $users;
    private $request;
    private $podcasts;
    private $replyComments;
    private $lang;
    private $userId;
    private $currentUser;

    public function __construct()
    {
        $this->request = request();
        $this->blade = blade();
        $this->comments = loadModel(PodcastComments::class);
        $this->userId = $_SESSION['USERID'];
        $this->users = loadModel(Users::class);
        $this->podcasts = loadModel(Podcasts::class);
        $this->replyComments = loadModel(ReplyPodcastComments::class);
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'comments');
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
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

    public function management()
    {
        echo $this->blade->render('backend/main/layout/podcast-comments/management', [
            'view' => $this->blade,
            'lang' => $this->lang,
            'users' => $this->users,
            'comments' => array_reverse($this->comments->get()),
            'replyComments' => $this->replyComments,
            'episodes' => $this->podcasts,
            'currentUser' => $this->currentUser,
            'header' => $this->loadBackendHeader(),
        ]);
    }

    public function approve(int $itemId)
    {
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/podcasts-comments-management/approve/' . $itemId) {
            $comment = current($this->comments->get(['id' => $itemId]));
            $commentor = current($this->users->get(['id' => $comment->user_id]));
            if (empty($comment)) {
                exit('<b>Invalid Comment</b>');
            }
            if (!($commentor->user_type == 'admin' && $this->currentUser->user_type == 'fulladmin') && !($commentor->user_type == 'user' && $this->currentUser->user_type == 'admin')) {
                exit('<b>Invalid Access</b>');
            }
            if ($comment->status == 'approved') {
                $errorMessage = $this->comments->update(['id' => $itemId], ['status' => 'disapproved']);
                if (!empty($errorMessage)) {
                    exit('error');
                }
            } else {
                $errorMessage = $this->comments->update(['id' => $itemId], ['status' => 'approved']);
                if (!empty($errorMessage)) {
                    exit('error');
                }
            }
        } else {
            $reply = current($this->replyComments->get(['id' => $itemId]));
            $commentor = current($this->users->get(['id' => $reply->user_id]));
            if (empty($reply)) {
                exit('<b>Invalid Comment</b>');
            }
            if (!($commentor->user_type == 'admin' && $this->currentUser->user_type == 'fulladmin') && !($commentor->user_type == 'user' && $this->currentUser->user_type == 'admin')) {
                exit('<b>Invalid Access</b>');
            }
            if ($reply->status == 'approved') {
                $errorMessage = $this->replyComments->update(['id' => $itemId], ['status' => 'disapproved']);
                if (!empty($errorMessage)) {
                    exit('error');
                }
            } else {
                $errorMessage = $this->replyComments->update(['id' => $itemId], ['status' => 'approved']);
                if (!empty($errorMessage)) {
                    exit('error');
                }
            }
        }
        redirect('/panel/podcasts-comments-management');
    }

    public function delete(int $itemId)
    {
        if ($_SERVER['REQUEST_URI'] ==  '/ParsaFramework/panel/podcasts-comments-management/delete/' . $itemId) {
            $comment = current($this->comments->get(['id' => $itemId]));
            $commentor = current($this->users->get(['id' => $comment->user_id]));
            if (empty($comment)) {
                exit('<b>Invalid Comment</b>');
            }
            if (!($commentor->user_type == 'admin' && $this->currentUser->user_type == 'fulladmin') && !($commentor->user_type == 'user' && $this->currentUser->user_type == 'admin')) {
                exit('<b>Invalid Access</b>');
            }
            $errorMessage = $this->comments->delete(['id' => $itemId]);
            if (!empty($errorMessage)) {
                exit('error');
            }
        } else {
            $reply = current($this->replyComments->get(['id' => $itemId]));
            $commentor = current($this->users->get(['id' => $reply->user_id]));
            if (empty($reply)) {
                exit('<b>Invalid Comment</b>');
            }
            if (!($commentor->user_type == 'admin' && $this->currentUser->user_type == 'fulladmin') && !($commentor->user_type == 'user' && $this->currentUser->user_type == 'admin')) {
                exit('<b>Invalid Access</b>');
            }
            $errorMessage = $this->replyComments->delete(['id' => $itemId]);
            if (!empty($errorMessage)) {
                exit('error');
            }
        }
        redirect('/panel/podcasts-comments-management');
    }
}
