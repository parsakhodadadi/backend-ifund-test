<?php

namespace App\Controllers;

use App\Exception\QueryBuilderException;
use App\Middlewares\LoginMiddleware;
use App\Models\Category;
use App\Models\users;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\QueryBuilder;
use Core\System\Validation;

class CategoryController extends controller
{
    use QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private array $request;
    private $successMessage;
    private $errorMessage;
    private $validationErrors;
    private $configHelper;

    public function __construct()
    {
        $this->request = request();
        $this->loginMiddleware = new LoginMiddleware();
        $this->configHelper = new ConfigHelper();
        $this->loginMiddleware->boot();
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'category');
        $this->blade = $this->view()->blade();
    }

    public function create()
    {
        $this->validationErrors = $this->request(CategoryRequest::class);

        if (!empty($this->request) && empty($this->validationErrors)) {
            $this->request['user_id'] = $_SESSION['USERID'];
            $this->errorMessage = $this->queryBuilderException()
                ->handle($this->request, $this->queryBuilder()->from('categories'));
            if (empty($this->errorMessage)) {
                $this->successMessage = __('category.success');
            }
        }

        $view = $this->blade->render('backend/main/layout/category/create', [
            'errors' => $this->validationErrors,
            'lang' => $this->lang,
            'successMessage' => $this->successMessage,
            'errorMessage' => $this->errorMessage,
        ]);

        echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content' => $view]);
    }


//
//    public function update() {
//
//    }
}
