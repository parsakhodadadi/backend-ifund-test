<?php

namespace App\Controllers;

use App\Request\PodcastRequest;
use Core\System\controller;

class PodcastController extends controller
{
    private $blade;
    private $request;
    private $podcasts;
    private $userId;

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
    }

    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(PodcastRequest::class);
        if (!empty($this->request) && empty($errors)) {

        }

        echo $this->blade->render('frontend/main/podcasts', [
            'errors' => $errors,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'view' => $this->blade,
        ]);
    }
}
