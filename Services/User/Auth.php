<?php

namespace App\Services\User;

class Auth
{
    private array $data = [];
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * singleton design pattern ...
     */
    private static $instances = [];

    public static function getInstance(array $data = []): Auth
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($data);
        }
        return self::$instances[$cls];
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
