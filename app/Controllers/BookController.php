<?php

namespace App\Controllers;

use Core\System\controller;
use Core\System\Helpers\QueryBuilder;

class BookController extends controller
{
    use QueryBuilder;

    private object $blade;
    private $userId;
    private $books;
    private $request;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];

    }


}