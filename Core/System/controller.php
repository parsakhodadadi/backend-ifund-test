<?php
/**
 *description
 *
 * created by:Parsa Khodadadi
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

    static public function view($name,$data = null)
    {
        view($name,$data);
    }

}