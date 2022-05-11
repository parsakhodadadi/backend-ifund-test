<?php

use Helper\Directives;
use Helper\MyClass;
use Jenssegers\Blade\Blade;
use function Helper\globalfn1;

function blade()
{
    $blade = new Blade('Views', 'cache');
    Directives::boot($blade);
    return $blade;
}

function loadFunctions()
{
    $ob = new MyClass();
    $ob->boot();
}

function view($view=null, $data=[])
{
    if(!empty($data)) {
        foreach ($data as $var=>$value) {
            $$var=$value;
        }
    }

    if (file_exists("Views/"."$view".".php")) {
        include "Views/$view".".php";
    }else {
        exit("Views/$view".".php"." does not exist");
    }

}


function loadController($controllerName=null)
{
    return new $controllerName;
}

//function lang($lang, $languageNames = ['home']): array {
//    if (!empty(is_dir("languages/$lang"))) {
//        if (!empty($languageNames)) {
//            foreach ($languageNames as $languageName) {
//                $langFile = "languages/$lang/$languageName.php";
//                if (file_exists($langFile)) {
//                    $allLanguages[$languageName] = include $langFile;
//                } else {
//                    exit("$languageName does not exist");
//                }
//            }
//            return $allLanguages;
//        }
//    } else exit("$lang directory does not exist");
//}

function loadLang($lang='fa',$file=null)
{
    $configHelper = new configHelper();
    try {
        return include "./languages/{$configHelper::getConfig('default-language')}/$file.php";
    } catch (Exception $e) {
        return $lang;
    }
}

function loadModel($modelName) {
    include "Models/$modelName.php";
    $modelAddress = '\App\Models\\'.$modelName;
    return $modelAddress;
}

function route($route)
{
    $configHelper = new configHelper();
    return $configHelper->setURL($route);
}

//function showSubMenus($model, $menu) {
//    $parentId = $menu->parent_id;
//    while (True) {
//        $subMenus = $model->from('menus')->where('parent_id', $parentId);
//        if (!empty($subMenus)) {
//            foreach ($subMenus as $subMenu) {
//                echo '<li>';
//                echo "<a href='$subMenu->route'> $subMenu->name </a>";
//                echo '</li>';
//                $parentId = $subMenu->parent_id;
//            }
//        }
//    }
//}

function redirect($route = null)
{
    $config = include "Configs/config.php";
    header('location:'.$config['base-url'].'login');
}

function request() {
    if (!empty($_GET)) return $_GET;
    if (!empty($_POST)) return $_POST;
}


