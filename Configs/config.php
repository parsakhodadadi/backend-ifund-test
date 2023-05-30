<?php

error_reporting(E_ALL);
$configs = [
    //defines base url of the project
    //ex: www.test.com

    'base-url'=>'http://localhost:8888/ParsaFramework',

    //false disable true enable
    'debug'=>true,

    'default-database'=>'myDatabase',

    'default-controller'=>new App\Controllers\PanelController,

    'default-method'=>'show',

    'default-language'=>'fa',

    'views' => [
        'directory' => 'views',
        'cache' => 'cache'
    ],
];