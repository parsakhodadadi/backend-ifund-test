<?php

namespace App\Services\User;

use App\Services\User\DesignPatterns\Strategy\Interfaces\RegisterInterface;

class RegisterAuth
{
    private $registerMethod;
    public function __construct(RegisterInterface $registerMethod)
    {
        $this->registerMethod = $registerMethod;
//        $this->data = [];
    }

    /**
     * singleton design pattern ...
     */
    private static $instances = [];

    public static function getInstance($strategy): RegisterAuth
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($strategy);
        }
        return self::$instances[$cls];
    }

    public function method()
    {
        return $this->registerMethod;
    }

    public function getEmail()
    {
        return $_POST['email'];
    }
}