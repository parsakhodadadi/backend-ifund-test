<?php

use Helper\Directives;
use Helper\MyClass;
use Jenssegers\Blade\Blade;
use Core\System\Helpers\ConfigHelper;
use App\Models\Categories;

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
}

function route($route)
{
    $configHelper = new ConfigHelper();
    return $configHelper->setURL($route);
}

function redirect($route = null)
{
    global $configs;
    $configHelper = new ConfigHelper();
    $configHelper::checkFileExist("Configs/config.php");
    header_remove();
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

function explodeWhere($where)
{
    $conditions = null;

    $counter = 0;
    $count = count($where);

    if (is_array($where) && !empty($where)) {
        foreach ($where as $field => $value) {
            $counter++;
            if ($counter == 1) {
                if ($counter == $count) {
                    $conditions = $field . '=' . "'$value'";
                } else {
                    $conditions = $field . '=' . "'$value'" . ' AND ';
                }
            } else {
                if ($counter == $count) {
                    $conditions .= $field . '=' . "'$value'";
                } else {
                    $conditions .= $field . '=' . "'$value'" . ' AND ';
                }
            }
        }
    } else {
        $conditions = 1;
    }

    return $conditions;
}

function getClientIP() : string
{
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        return $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        return $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    } else {
        return 'Unknown';
    }
}
