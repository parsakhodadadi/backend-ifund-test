<?php

namespace Core\System;

use Jenssegers\Blade\Blade;

class View
{
    public function blade()
    {
        $views = \configHelper::getConfig('views');
        return new Blade($views['directory'], $views['cache']);
    }
}