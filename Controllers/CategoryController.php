<?php

namespace App\Controllers;

use App\Exception\QueryBuilderException;
use App\Middlewares\LoginMiddleware;
use App\Models\Category;
use App\Models\users;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Validation;

class CategoryController extends controller
{
    use \QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private $request;
    private $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = $this->connection();
        $this->request = request();
        $this->loginMiddleware = new LoginMiddleware();
//        $this->loginMiddleware->boot();
        $lang = \configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'category');
        $this->blade = $this->view()->blade();
    }
//
    public function create()
    {
        $successMessage = null;
        $errorMessage = null;
        $exception = new QueryBuilderException();
        $errors = $this->request(CategoryRequest::class);

        if (!empty($this->request) && empty($errors)) {

            $this->request['user_id'] = $_SESSION['USERID'];
            $errorMessage = $exception->handle($this->request, $this->queryBuilder->from('categories'));
            if (empty($errorMessage)) {
                $successMessage = __('category.success');
            }

        }

        $view = $this->blade->render('backend/main/layout/category/create', [
            'errors' => $errors ,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);

        echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content' => $view]);

    }

//
//    public function update() {
//
//    }
}