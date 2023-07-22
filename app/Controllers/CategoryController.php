<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Models\Categories;
use App\Request\CategoryRequest;
use Cake\Core\App;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\QueryBuilder;
use Core\System\Validation;

include "app/Models/Categories.php";

class CategoryController extends controller
{
    use QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private array $request;
    private $categories;
    private $successMessage;
    private $queryBuilder;
    private $errorMessage;
    private $validationErrors;
    private $configHelper;

    public function __construct()
    {
        $this->request = request();
        $this->categories = loadModel(Categories::class);
        $this->loginMiddleware = new LoginMiddleware();
        $this->configHelper = new ConfigHelper();
        $this->queryBuilder = $this->queryBuilder();
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
            $this->errorMessage = $this->categories->insert($this->request);
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

    public function show()
    {
        $categoriesList = $this->categories->get();
        $view = $this->blade->render('backend/main/layout/category/list', [
            'lang' => $this->lang,
            'categories' => $categoriesList
        ]);
        echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content' => $view]);
    }

    public function edit(int $itemId)
    {
//        $this->errorMessage = null;
//        $this->request = request();
        $this->validationErrors = null;
        $this->errorMessage = null;
        $this->validationErrors = $this->request(CategoryRequest::class);
        $categoryToEdit = current($this->categories->get(['id' => $itemId]));
        $this->categories = loadModel(Categories::class);
        if (!empty($this->request) && empty($this->validationErrors)) {
            $updateProcess = $this->categories->update($categoryToEdit->id, $this->request);
            if ($updateProcess) {
                $this->successMessage = 'دسته بندی مورد نظر با موفقیت به روز رسانی شد.';
            }
        }

        $view = $this->blade->render('backend/main/layout/category/edit', [
            'lang' => $this->lang,
            'category' => $categoryToEdit,
            'successMessage' => $this->successMessage,
            'errorMessage' => $this->errorMessage,
        ]);
        echo $this->blade->render('backend/main/panel', ['view' => $this->blade, 'content' => $view]);
    }

    public function delete(int $itemId)
    {
        $this->errorMessage = null;
        $this->errorMessage = $this->categories->delete($itemId);
        if (!empty($this->errorMessage)) {
            exit('error deleting user.');
        }
        redirect('/admin/category/list');
    }
}
