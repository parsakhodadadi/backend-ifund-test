<?php

namespace App\Controllers;

use App\Models\PodcastComments;
use App\Models\Podcasts;
use App\Models\ReplyPodcastComments;
use App\Models\Users;
use App\Request\PodcastRequest;
use App\Request\PostRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class PodcastController extends controller
{
    private $blade;
    private $request;
    private $podcasts;
    private $userId;
    private $lang;
    private $users;
    private $currentUser;
    private $comments;
    private $replyComments;

    public function __construct()
    {
        $this->blade = blade();
        $this->request = request();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userId = $_SESSION['USERID'];
        $lang = ConfigHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'podcasts');
        $this->users = loadModel(Users::class);
        $this->currentUser = current($this->users->get(['id' => $this->userId]));
        $this->podcasts = loadModel(Podcasts::class);
        $this->comments = loadModel(PodcastComments::class);
        $this->replyComments = loadModel(ReplyPodcastComments::class);
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(PodcastRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $tmpFile = $_FILES['photo']['tmp_name'];
            $newFile = 'files/' . $_FILES['photo']['name'];
            if (!move_uploaded_file($tmpFile, $newFile)) {
                exit('error uploading file');
            }
            $this->request['photo'] = $newFile;
            $this->request['user_id'] = $this->userId;
            $this->request['date'] = date("Y/m/d");
            $this->request['time'] = date("h:i:sa");
            $tmpName = $_FILES['podcast']['tmp_name'];
            $fileName = 'files/' . $_FILES['podcast']['name'];
            if (move_uploaded_file($tmpName, $fileName)) {
                unset($this->request['files']);
                $this->request['podcast'] = $fileName;
            } else {
                exit('error uploading file');
            }
            $errorMessage = $this->podcasts->insert($this->request);
            if (empty($errorMessage)) {
                if ($this->request['status'] == 'pre-written') {
                    $successMessage = __('podcasts.podcast-add-suc');
                } elseif ($this->request['status'] == 'disapproved') {
                    $successMessage = __('podcasts.podcast-add-suc-final');
                } else {
                    $successMessage = __('podcasts.podcast-add-suc');
                }
            } else {
                exit($errorMessage);
            }
        }

        echo $this->blade->render('backend/main/layout/podcasts/create', [
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
            'lang' => $this->lang,
            'currentUser' => $this->currentUser,
            'action' => '/panel/add-podcast',
            'errors' => $errors,
            'successMessage' => $successMessage,
            'method' => 'create',
        ]);
    }

    public function edit(int $itemId)
    {
        $episode = current($this->podcasts->get(['id' => $itemId]));
        if ($episode->user_id != $this->userId) {
            exit('Invalid Access');
        }
        $errorMessage = null;
        $successMessage = null;
        $tmpNamePhoto = null;
        $fileNamePhoto = null;
        $tmpNameAudio = null;
        $fileNameAudio = null;
        $uploadNewPhoto = 0;
        $uploadNewAudio = 0;

        if (!empty($this->request)) {
            if (!empty($_FILES['photo']['name'])) {
                $tmpNamePhoto = $_FILES['photo']['tmp_name'];
                $fileNamePhoto = 'files/' . $_FILES['photo']['name'];
                $uploadNewPhoto = 1;
            } else {
                $this->request['files']['photo']['name'] = $episode->photo;
            }
            if (!empty($_FILES['podcast']['name'])) {
                $tmpNameAudio = $_FILES['podcast']['tmp_name'];
                $fileNameAudio = 'files/' . $_FILES['podcast']['name'];
                $uploadNewAudio = 1;
            } else {
                $this->request['files']['podcast']['name'] = $episode->photo;
            }
            $errors = $this->request(PodcastRequest::class);
            if (!empty($errors)) {
                if ($this->currentUser->user_type != 'admin') {
                    $status = 'approved';
                } else {
                    $status = 'disapproved';
                }

                if ($uploadNewPhoto == 1) {
                    if (!move_uploaded_file($tmpNamePhoto, $fileNamePhoto)) {
                        exit('error uploading photo');
                    }
                    $this->request['photo'] = $fileNamePhoto;
                }

                if ($uploadNewAudio == 1) {
                    if (!move_uploaded_file($tmpNameAudio, $fileNameAudio)) {
                        exit('error uploading photo');
                    }
                    $this->request['podcast'] = $fileNameAudio;
                }
                unset($this->request['files']);
                $this->request['user_id'] = $this->userId;
                $this->request['status'] = $status;
                $this->request['date'] = date("Y/m/d");
                $this->request['time'] = date("h:i:sa");
                $this->request['edited'] = 'yes';
                $errorMessage = $this->podcasts->update(['id' => $itemId], $this->request);
                if (empty($errorMessage)) {
                    $episode = current($this->podcasts->get(['id' => $itemId]));
                    if ($this->currentUser->user_type == 'admin') {
                        $successMessage = __('podcasts.update-suc-admin');
                    } else {
                        $successMessage = __('podcasts.update-suc-fulladmin');
                    }
                } else {
                    exit('error');
                }
            }
        }
        echo $this->blade->render('backend/main/layout/podcasts/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/my-podcasts/edit/' . $itemId,
            'episode' => $episode,
            'method' => 'update',
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
            'currentUser' => $this->currentUser,
        ]);
    }

    public function management()
    {
        echo $this->blade->render('backend/main/layout/podcasts/management', [
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
            'episodes' => array_reverse($this->podcasts->get()),
            'users' => $this->users,
        ]);
    }

    public function podcastSingle(int $itemId)
    {
        $episode = current($this->podcasts->get(['id' => $itemId]));
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/my-podcasts/' . $itemId) {
            if ($episode->user_id != $this->userId) {
                exit('Invalid Access');
            }
        }
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/my-podcasts/' . $itemId) {
            if ($episode->user_id != $this->userId) {
                exit('invalid access');
            }
        }
        $comments = loadModel(PodcastComments::class);
        $replyComments = loadModel(ReplyPodcastComments::class);
        $publisher = current($this->users->get(['id' => $episode->user_id]));
        echo $this->blade->render('backend/main/layout/podcasts/podcast-single', [
            'view' => $this->blade,
            'episode' => $episode,
            'header' => $this->loadBackendHeader(),
            'publisher' => $publisher,
            'comments' => $comments->get(['podcast_id' => $itemId]),
            'users' => $this->users,
            'action' => '/podcasts/' . $itemId . '/add-comment',
            'reply' => '0',
            'replyComments' => $replyComments,
        ]);
    }

    public function userPodcasts()
    {
        $episodes = $this->podcasts->get(['user_id' => $this->userId]);
        echo $this->blade->render('backend/main/layout/podcasts/user-podcasts', [
            'view' => $this->blade,
            'header' => $this->loadBackendHeader(),
            'episodes' => array_reverse($episodes),
        ]);
    }

    public function approve(int $itemId)
    {
        $episode = current($this->podcasts->get(['id' => $itemId]));
        if ($episode->status == 'pre-written') {
            exit('this status can not be deleted');
        } elseif ($episode->status == 'approved') {
            $errorMessage = $this->podcasts->update(['id' => $itemId], ['status' => 'disapproved']);
        } else {
            $errorMessage = $this->podcasts->update(['id' => $itemId], ['status' => 'approved']);
        }
        if (!empty($errorMessage)) {
            exit('error');
        }

        redirect('/panel/podcasts-management');
    }

    public function delete(int $itemId)
    {
        $episode = current($this->podcasts->get(['id' => $itemId]));
        if ($_SERVER['REQUEST_URI'] == '/ParsaFramework/panel/podcasts-management/delete/' . $itemId) {
            $route = '/panel/podcasts-management';
        } else {
            if ($episode->user_id != $this->userId) {
                exit('invalid access');
            }
            $route = '/panel/my-podcasts';
        }
        $relatedComments = $this->comments->get(['podcast_id' => $itemId]);
        foreach ($relatedComments as $relatedComment) {
            if ($this->replyComments->delete(['podcast_comment_id' => $relatedComment->id])) {
                exit('error');
            }
        }
        if ($this->comments->delete(['podcast_id' => $itemId])) {
            exit('error');
        }
        $errorMessage = $this->podcasts->delete(['id' => $itemId]);
        if (!empty($errorMessage)) {
            exit('error');
        }
        redirect($route);
    }
}
