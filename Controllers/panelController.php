<?php
namespace App\Controllers;

use App\Models\menus;
use App\Models\users;
use Core\System\controller;
use Core\System\validation;
use Helper\MyClass;

if (!defined('ACCESS')) die('No script access directly is allowed.');
class panelController extends controller
{
    use \databaseHelper;

    private $userController;
    private static $blade;

    public function __construct()
    {
        self::$blade = blade();
    }

    static function panel()
    {
//        $lang = loadLang('fa', 'login');
//        $queryBuilder = self::queryBuilder();
//        $db = $queryBuilder->from('menus');
//        $menus = $db->all();
//
//        echo self::$blade->make('Backend/main/index', ['lang'=>$lang, 'view'=>self::$blade, 'menus'=>$menus])->render();
        $lang = loadLang('fa', 'login');
//        $content = self::$blade->make('Backend/main/layout/menus')->render();
        echo self::$blade->make('Backend/main/index',
            [
                'lang' => $lang,
                'view' => self::$blade,
//                'content' => $content
            ]
        );
    }

    static function addMenu()
    {
        $lang = loadLang('fa', 'login');
        echo self::$blade->make('Backend/main/layout/menus', ['lang'=>$lang, 'view'=>self::$blade])->render();

        if (!empty($_POST)) {
//            $rules = [
//                'name' => 'required',
//            ];
//
//            $messages = [
//                'name.required' => 'نام منو را وارد کنید.'
//            ];
//
//            $errors = [];
//            $errors = self::validation()->rules($rules, $_POST, $messages);

            $menus = new menus();
            $menus::insert($_POST);
        }
    }

    public function categoryForm() {

    }

    public function showMenus()
    {
        $lang = loadLang('fa', 'login');

        $model = self::queryBuilder();
        $menus = $model->from('menus')->whereNull('parent_id')->all();

        echo '<ul>';
        foreach ($menus as $menu) {
            echo "<li class='$menu->icon'>";
            echo "<a href='$menu->route'> $menu->name </a>";
                 showSubMenus($model);
            echo "</li>";
        }
        echo '</ul>';
    }
}