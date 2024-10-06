<?php

namespace App\Services\User;

use App\Services\User\DesignPatterns\Strategy\Interfaces\SignupInterface;

class SignupService
{
    private object $registerMethod;
    public function __construct(SignupInterface $registerMethod)
    {
        $this->registerMethod = $registerMethod;
//        $this->data = [];
    }

    /**
     * singleton design pattern ...
     */
    private static $instances = [];

    public static function getInstance($strategy): SignupService
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

    public function getData()
    {
        return $_POST;
    }
}