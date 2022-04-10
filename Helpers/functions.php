<?php

namespace Helper;

class Functions
{
    public function __construct()
    {
        $this->boot();
    }

    function boot()
    {
        //Functions declared inside have global scope

        function globalfn1() { echo "fn1"; }

        function globalfn2() { echo "fn2"; }
    }
}
