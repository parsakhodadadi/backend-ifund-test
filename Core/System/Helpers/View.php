<?php

namespace Core\System;

use Core\System\Helpers\ConfigHelper;
use Jenssegers\Blade\Blade;

class View
{
    public function blade()
    {
        $configHelper = new ConfigHelper();
        $views = $configHelper->getConfig('views');
        return new Blade($views['directory'], $views['cache']);
    }
}