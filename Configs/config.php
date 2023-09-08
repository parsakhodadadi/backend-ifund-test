<?php

//error_reporting(0);

$configs = [
    'sign-in-method' => new \App\Services\User\DesignPatterns\Strategy\Methods\Signin\UserPasswordSignin(),
    'sign-up-form' => new \App\Services\User\DesignPatterns\Strategy\Methods\Signup\SignupForm(),
    'email-verification-register' => new \App\Services\User\DesignPatterns\Strategy\Methods\Register\EmailVerification(),
    'edit-profile' => new \App\Services\User\DesignPatterns\Strategy\Methods\EditProfile\EditProfile(),
    'mobile-verification' => new \App\Services\User\DesignPatterns\Strategy\Methods\EditProfile\EmailVerification(),
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
