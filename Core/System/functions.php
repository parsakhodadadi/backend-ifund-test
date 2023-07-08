<?php

use Helper\Directives;
use Helper\MyClass;
use Jenssegers\Blade\Blade;
use Core\System\Helpers\ConfigHelper;

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

function view($view = null, $data = [])
{
    if (!empty($data)) {
        foreach ($data as $var => $value) {
            $$var = $value;
        }
    }

    if (file_exists("Views/" . "$view" . ".php")) {
        include "Views/$view" . ".php";
    } else {
        exit("Views/$view" . ".php" . " does not exist");
    }
}


function loadController($controllerName = null)
{
    return new $controllerName();
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

function loadLang($lang = 'fa', $file = null)
{
    $configHelper = new ConfigHelper();
    try {
        return include "./languages/{$configHelper->getConfig('default-language')}/$file.php";
    } catch (Exception $e) {
        return $lang;
    }
}

function loadModel($modelName)
{
    return new $modelName();
//    include "Models/$modelName.php";
//    $modelAddress = '\App\Models\\'.$modelName;
//    return $modelAddress;
}

function route($route)
{
    $configHelper = new ConfigHelper();
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
    global $configs;
    configHelper::checkFileExist("Configs/config.php");
    header('location:' . $configs['base-url'] . $route);
}

function request()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $request = $_POST;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $request = $_GET;
    }
    if (!empty($_FILES)) {
        $request['files'] = $_FILES;
    }

    return $request;
}

function __($lang)
{
    $language = explode('.', $lang);
    $lang = current($language);
    $key = end($language);

    $langFile = './languages/fa/' . $lang . '.php';
    if (file_exists($langFile)) {
        $allLangs = include $langFile;
        return $allLangs[$key];
    }
}

function displayError($errors = [], $element = null)
{
    if (!empty($errors)) {
        if (isset($errors[$element])) {
            foreach ($errors[$element] as $error) {
                echo '<p>' . $error . '</p>';
            }
        }
    }
}
