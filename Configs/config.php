<?php

$configs = [
    'login-method' => new \App\Services\User\DesignPatterns\Strategy\Methods\UserPasswordLogin(),
    'register-method' => new \App\Services\User\DesignPatterns\Strategy\Methods\RegisterForm(),
    'base-url' => 'http://localhost:8888/ParsaFramework',

    'debug' => true,

    'default-database' => 'myDatabase',

    'default-controller' => new App\Controllers\PanelController(),

    'default-method' => 'show',

    'default-language' => 'fa',

    'views' => [
        'directory' => 'views',
        'cache' => 'cache'
    ],
];
