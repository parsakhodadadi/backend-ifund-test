<?php

ini_set('display_errors', 1);

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new AaronRouter\Router\AaronRouter();
    $router->setNamespace('\App\Controllers');

    //Restrictions
    $router->setRestriction('/panel', 'SigninController', 'checkSignin');
    $router->setRestriction('/panel/.*', 'SigninController',  'checkSignin');

    //Define Routes
    $router->set('/panel', 'PanelController', 'panel');
    $router->set('/sign-in', 'SigninController', 'form');
    $router->set('/sign-up', 'SignupController', 'form');
    $router->set('/panel/users-management', 'UsersController', 'management');
    $router->set('/sign-out', 'SigninController', 'signOut');
    $router->set('/panel/users-management/block/d', 'UsersController', 'block', true);
    $router->set('/panel/users-management/delete/d', 'UsersController', 'delete', true);
    $router->set('/panel/edit-profile', 'ProfileController', 'edit');

    $router->setRestriction('/panel/users-management', 'SigninController', 'checkAdmin');

    //run it !
    $router->run();
}
