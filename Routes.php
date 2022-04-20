<?php

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('\App\Controllers');

//$router->get('/add-menu', function () {
//    $panel = new \App\Controllers\panelController();
//    $blade = $panel::$blade;
//    $lang = loadLang('fa', 'login');
//    echo $blade->make('Backend/main/layout/menus',['lang'=>$lang, 'view'=>$blade])->render();
//});
//
//$router->get('/add-menu-post', function () {
//    $panel = new \App\Controllers\panelController();
//    $blade = $panel::$blade;
//    $lang = loadLang('fa', 'login');
//    echo $blade->make('Backend/main/layout/menus',['lang'=>$lang, 'view'=>$blade])->render();
//});

$router->get('/', 'panelController@panel');

$router->post('/panel', 'panelController@panel');

$router->get('/login', 'LoginController@login');

$router->post('/login', 'LoginController@login');

$router->get('/add-menu', 'panelController@addMenu');

$router->post('/add-menu','panelController@addMenu');

$router->get('/register', 'userController@registerData');

$router->post('/register', 'userController@registerData');

$router->get('/login', 'userController@login');

$router->get('/checkLogin', 'userController@checkLoginInfo');

// API Routes
$router->get('/api/v1/test', function () {
    echo 'API TEST';
});

$router->set404('ErrorController@error404');

//$router->set404(function () {
//    header('HTTP/1.1 404 Not Found');
//    // echo 'page not found';
//    // ... do something special here
//});

//$router->get('/test1', function () {
//    echo 'test1';
//});
//$router->before('GET', '/test/.*', function () {
//    echo 'check middleware';
//});
//$router->set404(function () {
//    // header('HTTP/1.1 404 Not Found');
//    echo 'page not found';
//    // ... do something special here
//});
//// Run it!
$router->run();

