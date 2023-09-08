<?php

namespace App\Services\User;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SigninInerface;

class SigninAuth
{
    private object $loginMethod;
    public function __construct(SigninInerface $loginMethod)
    {
        $this->loginMethod = $loginMethod;
//        $this->data = [];
    }

    /**
     * singleton design pattern ...
     */
    private static $instances = [];

    public static function getInstance($strategy): SigninAuth
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($strategy);
        }
        return self::$instances[$cls];
    }

    public function method()
    {
        return $this->loginMethod;
    }

    public function getUserId(): int
    {
        session_start();
        if (isset($_SESSION['USERID'])) {
            return $_SESSION['USERID'];
        }
        return 0;
    }
}
