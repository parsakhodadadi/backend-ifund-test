<?php

namespace App\Controllers;

use App\Models\Podcasts;
use App\Models\Users;
use App\Request\PodcastRequest;
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
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(PodcastRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['user_id'] = $this->userId;
            $tmpName = $_FILES['podcast']['tmp_name'];
            $fileName = 'files/' . $_FILES['podcast']['name'];
            if ($this->uploadPhoto($tmpName, $fileName)) {
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
        ]);
    }
}
