<?php


namespace App\Controllers;

use App\Exception\QueryBuilderException;
use App\Middlewares\LoginMiddleware;
use App\Models\users;
use App\Request\RegisterRequest;
use App\Services\User\RegisterAuth;
use Core\System\controller;
use Core\System\Helpers\ConfigHelper;
use Jenssegers\Blade\Blade;
use Requtize\QueryBuilder\QueryBuilder\QueryBuilder;

class RegisterController extends controller
{
    use \Core\System\Helpers\QueryBuilder;

    private $authService;
    private object $loginMiddleware;
    private $lang;
    private object $blade;
    private $request;
    private $queryBuilder;
    private $configHelper;
    private $registerMethod;
    private $errorMessage = null;
    private $successMessage = null;
    private $errors;

    public function __construct()
    {
        $this->configHelper = new ConfigHelper();
        $this->queryBuilder = $this->queryBuilder();
        $this->authService = RegisterAuth::getInstance($this->configHelper::getConfig('register-method'));
        $lang = $this->configHelper::getConfig('default-language');
        $this->lang = loadLang($lang, 'register');
        $this->blade = $this->view()->blade();
        $this->registerMethod = $this->configHelper::getConfig('register-method');
    }

    public function register()
    {
        $registerMethod = $this->authService->method()->getViewName();
        $this->request = request();
        $exception = new QueryBuilderException();
        $this->errors = $this->request(RegisterRequest::class);
        if (!empty($this->request) && empty($errors)) {
            if (empty($this->errors) && $this->errorMessage == null) {
                $this->request['password'] = password_hash($this->request['password'], PASSWORD_DEFAULT);
                $this->errorMessage = $exception->handle($this->request, $this->queryBuilder->from('users'));
                if (!$this->sendVerificationCode($this->request['email'])) {
                    echo 'error';
                    die("error sending email please try again later.");
                }
                redirect('/verifyEmail');
            } else {
                echo self::view()->blade()->render("backend/register-form", [
                    'errors' => $this->errors,
                    'lang' => $this->lang,
                    'errorMessage' => $this->errorMessage,
                ]);
            }
        } else {
            echo self::view()->blade()->render("backend/register-form", [
                'lang' => $this->lang,
            ]);
        }
    }

    public function sendVerificationCode(string $email): int
    {
        $token = rand(100000, 999999);

        if (!mail($email, 'Verification Code', "Verification Code:".$token , "From: parsakhodadadi2003@gmail.com")) {
            echo 'Message could not be sent.';
            return 0;
        }
        return $token;
    }

    public function verifyEmail()
    {
        $this->request = request();
        $this->errors = $this->request(RegisterRequest::class);
        echo $this->blade->render("backend/email-verification", [
            'lang' => $this->lang,
            'errors' => $this->errors,
            'errorMessage' => $this->errorMessage
        ]);
    }
}
