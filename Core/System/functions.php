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

    if(file_exists("Views/"."$view".".php")) {
        include "Views/$view".".php";
    }else {
        exit("Views/$view".".php"." does not exist");
    }

}


function loadController($controllerName=null)
{
    return new $controllerName;
}

//function loadModel($modelName) {
//    include "Models/$modelName.php";
//    $modelAddress='\App\Models\\'.$modelName;
//    return $modelAddress;
//}

function loadLang($lang='fa',$file=null)
{
    $configHelper = new configHelper();
    return include "./Views/languages/{$configHelper::getConfig('default-language')}/$file.php";
}

function route($route)
{
    $configHelper = new configHelper();
    return $configHelper->setURL($route);
}

function checkGetRequest($paramName = null, $pageName = null)
{
    if (isset($_GET[$paramName]) && isset($pageName)) {
        if ($_GET[$paramName] == $pageName) {
            return true;
        }else {
            return false;
        }
    }
}

function checkPostRequest($postStatus = true, $indexName = null)
{
    if (!empty($_POST)) {
        if ($postStatus) {
            return $_POST;
        }else {
            return $_POST[$indexName];
        }
    }
}

function showSubMenus($model, $menu) {
    $parentId = $menu->parent_id;
    while (True) {
        $subMenus = $model->from('menus')->where('parent_id', $parentId);
        if (!empty($subMenus)) {
            foreach ($subMenus as $subMenu) {
                echo '<li>';
                echo "<a href='$subMenu->route'> $subMenu->name </a>";
                echo '</li>';
                $parentId = $subMenu->parent_id;
            }
        }
    }
}

function redirect($url = null)
{
    if ($url != null)
    {
        header('LOCATION:'. $url);
    } else {
        // core error
    }
}


