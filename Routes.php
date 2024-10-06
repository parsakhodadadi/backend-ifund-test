<?php
use App\Controllers\HomeController;

ini_set('display_errors', 1);

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new AaronRouter\Router\AaronRouter();
    $router->setNamespace('\App\Controllers');

    //Restrictions
    $router->setRestriction('/panel', 'SigninController', 'checkSignin');
    $router->setRestriction('/panel/.*', 'SigninController', method: 'checkSignin');

    //Define Routes
    $router->set('/panel', 'PanelController', 'dashboard');
    $router->set('/sign-in', 'SigninController', 'form');
    $router->set('/sign-up', 'SignupController', 'form');

    //run it !
    $router->run();
}
