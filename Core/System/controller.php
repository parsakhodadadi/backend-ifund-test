<?php
/**
 *description
 *
 * created by:Parsa
 * email:parsakhodadadi2003@gmail.com
 * who:
 * updated at:
 *
 */

namespace Core\System;
use \Core\System;

class controller
{

    public function loadController($class)
    {
        return new $class;
    }

    public function validation() {
        return new validation();
    }

    static public function view() {
        return new View();
    }

    public function security() {
        return new \Security();
    }

    public function event() {
        return new \Event();
    }

//    static public function view($name, $data = null)
//    {
//        view($name, $data);
//    }


}