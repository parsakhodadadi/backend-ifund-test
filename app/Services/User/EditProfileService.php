<?php

namespace App\Services\User;

use App\Services\User\DesignPatterns\Strategy\Interfaces\EditProfileInterface;

class EditProfileService
{
    private object $editProfileMethod;
    public function __construct(EditProfileInterface $editProfileMethod)
    {
        $this->editProfileMethod = $editProfileMethod;
//        $this->data = [];
    }

    /**
     * singleton design pattern ...
     */
    private static $instances = [];

    public static function getInstance($strategy): EditProfileService
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($strategy);
        }
        return self::$instances[$cls];
    }

    public function method()
    {
        return $this->editProfileMethod;
    }

    public function getData()
    {
        return $_POST;
    }
}