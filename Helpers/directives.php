<?php

namespace Helper;

class Directives
{
    /**
     * @param $blade
     */
    static public function boot($blade)
    {
        $blade->directive('calc', function ($expression) {
            list($arg1, $arg2) = explode(',', $expression);
            return $arg1 + $arg2;
        });

        $blade->directive('helloWorld', function ($expression) {
            return "helloWorld";
        });
    }

}