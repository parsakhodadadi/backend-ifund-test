<?php

namespace App\Controllers;

use App\Middlewares\LoginMiddleware;
use App\Models\Users;
use App\Request\RegisterRequest;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Jenssegers\Blade\Blade;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilder;


class RegisterController extends controller
{
    use \Core\System\Helpers\QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private $request;
    private $queryBuilder;
    private $configHelper;

    public function __construct()
    {
        $this->request = request();
        $this->queryBuilder = $this->queryBuilder();
        $this->configHelper = new ConfigHelper();
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'register');
        $this->blade = $this->view()->blade();
    }

    public function register()
    {
        $successMessage = null;
        $errorMessage = null;
        $errors = $this->request(RegisterRequest::class);

        if (!empty($this->request) && empty($errors)) {
            $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
            $users = loadModel(Users::class);
            $errorMessage = $users->insert($this->request);
            if (empty($errorMessage)) {
                $successMessage = __('register.success');
            }
        }

        echo self::view()->blade()->render('backend/register-form', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);
    }
}