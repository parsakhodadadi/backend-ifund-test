<?php

namespace App\Controllers;

use App\Models\Subcategories;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Core\System\Helpers\QueryBuilder;

class SubcategoryController extends controller
{
    use QueryBuilder;

    private object $blade;
    private $userId;
    private $subCategories;
    private $request;
    private $lang;

    public function __construct()
    {
        $this->request = request();
        $this->blade = $this->view()->blade();
        $this->userId = $_SESSION['USERID'];
        $this->subCategories = loadModel(Subcategories::class);
        $this->lang = loadLang(ConfigHelper::getConfig('default-language'), 'category');
    }

    public function create(int $categoryId)
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $this->request['category_id'] = $categoryId;
            $errorMessage = $this->subCategories->insert($this->request);
            if (empty($errorMessage)) {
                $successMessage = __('category.sub-cat-added-suc');
            } else {
                exit('error saving data to database');
            }
        }

        $view = $this->blade->render('backend/main/layout/category/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/admin/category/list/add-sub/'. $categoryId,
            'errors' => $errors,
            'type' => 'add_sub_category',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
        ]);
    }
}