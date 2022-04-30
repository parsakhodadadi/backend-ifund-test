<?php

namespace App\Controllers;

use App\Models\users;
use Core\System\controller;

class CategoryController extends controller {

    private string $lang;
    private object $blade;

    public function __construct() {
        $lang = \configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'category');
        $this->blade = $this->view()->blade();
    }

    public function create() {
        $view = $this->blade->render('backend/main/layout/category/create');
        echo $this->blade->render('backend/main/layout/category/create', ['view' => $this->blade, 'content' => $view, 'lang' => $this->lang]);
    }

    public function update() {

    }

    public function form() {
        echo "category form";
    }
}