<?php

$configs = [
    //defines base url of the project
    //ex: www.test.com

    'base-url'=>'http://localhost:8888/ParsaFramework/',

    //false disable true enable
    'debug'=>true,

    'default-database'=>'database',

    'default-controller'=>new App\Controllers\panelController,

    'default-method'=>'show',

    'default-language'=>'fa',

    'views' => [
        'directory' => 'views',
        'cache' => 'cache'
    ],
];