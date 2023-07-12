<?php

use Bramus\Router\BramusRouter;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new BramusRouter();
    $router->setNamespace('\App\Controllers');
    //Define routes
    $router->get('/', 'HomeController@form');
    $router->get('/login', "LoginController@form");
    $router->post('/login', "LoginController@form");
    $router->get('/logout', "LoginController@logout");
    $router->get('/add-menu', "panelController@addMenu");

    $router->post('/add-menu', "panelController@addMenu");

    $router->get('/register', "RegisterController@register");

    $router->post('/register', "RegisterController@register");

    $router->get('/verifyEmail', "RegisterController@verifyEmail");
    $router->post('/verifyEmail', "RegisterController@verifyEmail");

    $router->get('/checkLogin', "userController@checkLoginInfo");

    $router->get('/admin', "PanelController@panel");
    $router->get('/admin/category', "CategoryController@create");

    $router->post('/admin/category', 'CategoryController@create');

    $router->get('admin/category/list', "CategoryController@show");

    $router->get('admin/category/list/edit/(\d+)', "CategoryController@edit");
    $router->post('admin/category/list/edit/(\d+)', "CategoryController@edit");

    $router->get('admin/category/list/delete/(\d+)', "CategoryController@delete");

    $router->before('GET|POST', '/admin', 'LoginController@checkLogin');
    $router->before('GET|POST', '/admin/.*', 'LoginController@checkLogin');

    $router->set404(function () {
//        header('HTTP/1.1 404 Not Found');
        echo 'route not found';
        // ... do something special here
    });

    //Run it!
    $router->run();
}
