<?php

namespace App\Controllers;

use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\QueryBuilder;

class BookController extends controller
{
    use QueryBuilder;

    private object $blade;
    private $userId;
    private $books;
    private $request;
    private $lang;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];
        $this->lang = loadLang(ConfigHelper::getConfig('default-language'), 'books');

    }

    public function addBook()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request();
        if (!empty($this->request))
        $view = $this->blade->render('backend/main/layout/books/add-edit');
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }


}