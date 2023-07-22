<?php

$configs = [
    'login-method' => new \App\Services\User\DesignPatterns\Strategy\Methods\Login\UserPasswordLogin(),
    'register-form' => new \App\Services\User\DesignPatterns\Strategy\Methods\Register\RegisterForm(),
    'email-verification-register' => new \App\Services\User\DesignPatterns\Strategy\Methods\Register\EmailVerification(),
    'edit-profile' => new \App\Services\User\DesignPatterns\Strategy\Methods\EditProfile\EditProfile(),
    'email-verification-edit-prof' => new \App\Services\User\DesignPatterns\Strategy\Methods\EditProfile\EmailVerification(),
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
