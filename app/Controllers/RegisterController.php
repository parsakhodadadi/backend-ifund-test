<?php
namespace App\Controllers;

use App\Exception\QueryBuilderException;
use App\Middlewares\LoginMiddleware;
use App\Models\users;
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
        $exception = new QueryBuilderException();
        $errors = $this->request(RegisterRequest::class);


        if (!empty($this->request) && empty($errors)) {
            $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
            $errorMessage = $exception->handle($this->request, $this->queryBuilder->from('users'));
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
//        $request = request();
//        if (!empty($request)) {
//            $this->model->insert(['username' => $request['username'], 'password' => $request['password']]);
//            print_r($request);
//        } else {
//            $lang = loadLang('fa', 'register');
//            echo $this->blade->make('backend/register',
//                [
//                    'lang' => $lang,
//                    'views' => $this->blade
//                ]
//            );
//        }
    }
}