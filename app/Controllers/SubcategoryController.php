<?php

namespace App\Controllers;

use App\Models\Subcategories;
use App\Request\CategoryRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;

class SubcategoryController extends controller
{

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

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/admin/categories/create/'. $categoryId,
            'errors' => $errors,
            'method' => 'create_sub',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
        ]);
    }

    public function edit(int $subcategoryId)
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(CategoryRequest::class);
        if (!empty($this->request) && empty($errors)) {
            $updateProcess = $this->subCategories->update($subcategoryId, $this->request);
            if ($updateProcess) {
                $successMessage = __('category.sub-cat-upd-suc');
            } else {
                exit('error saving data to database');
            }
        }

        $view = $this->blade->render('backend/main/layout/categories/create', [
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
            'action' => '/panel/admin/categories/create/'. $subcategoryId,
            'errors' => $errors,
            'method' => 'edit_sub',
        ]);
        echo $this->blade->render('backend/main/panel', [
            'view' => $this->blade,
            'content' => $view,
            'navigation' => $this->loadNavigation(),
        ]);
    }
}