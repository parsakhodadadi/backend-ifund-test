<?php

namespace App\Controllers;

use App\Exception\QueryBuilderException;
use App\Middlewares\LoginMiddleware;
use App\Models\users;
use App\Request\RegisterRequest;
use Core\System\controller;
use Jenssegers\Blade\Blade;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilder;

class RegisterController extends controller
{
    use \QueryBuilder;

    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private $request;
    private $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = $this->connection();
        $this->request = request();
        $lang = \configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'register');
        $this->blade = $this->view()->blade();
    }

    public function register()
    {
        $successMessage = null;
        $errorMessage = null;
        $exception = new QueryBuilderException();
        $errors = $this->request(RegisterRequest::class);


        if (!empty($this->request) && empty($errors)) {
            $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
            $errorMessage = $exception->handle($this->request, $this->queryBuilder->from('users'));
            if (empty($errorMessage)) {
                $successMessage = __('register.success');
            }
        }

        echo self::view()->blade()->render('backend/register', [
            'errors' => $errors,
            'lang' => $this->lang,
            'successMessage' => $successMessage,
            'errorMessage' => $errorMessage,
        ]);
    }
}
