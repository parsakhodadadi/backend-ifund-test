<?php

use Bramus\Router\BramusRouter;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new BramusRouter();
    $router->setNamespace('\App\Controllers');
    //Define routes
    $router->get('/', 'HomeController@showPosts');
    $router->get('/panel', 'HomeController@showPosts');
    $router->get('/Authors', 'HomeController@showAuthors');

    $router->get('/login', "LoginController@form");
    $router->post('/login', "LoginController@form");
    $router->get('/logout', "LoginController@logout");

    $router->get('/panel/management/posts', "PostController@show");
    $router->post('/panel/management/posts', "PostController@show");

    $router->get('/panel/admin/authors/create', "AuthorController@create");
    $router->post('/panel/admin/authors/create', "AuthorController@create");

    $router->get('/panel/admin/authors/edit/(\d+)', "AuthorController@edit");
    $router->post('/panel/admin/authors/edit/(\d+)', "AuthorController@edit");

    $router->get('/panel/management/authors', "AuthorController@show");
    $router->get('/panel/management/authors/approve/(\d+)', "AuthorController@approve");
    $router->get('/panel/management/authors/delete/(\d+)', "AuthorController@delete");

    $router->get('/panel/admin/posts/edit/(\d+)', "PostController@edit");
    $router->post('/panel/admin/posts/edit/(\d+)', "PostController@edit");

    $router->get('/panel/management/posts/approve/(\d+)', "PostController@approve");
    $router->get('/panel/management/posts/delete/(\d+)', "PostController@delete");

    $router->get('/register', "RegisterController@register");
    $router->post('/register', "RegisterController@register");

    $router->get('/emailVerification', "RegisterController@emailVerification");
    $router->post('/emailVerification', "RegisterController@emailVerification");

    $router->get('/panel/admin/categories/create', "CategoryController@create");
    $router->post('/panel/admin/categories/create', 'CategoryController@create');

    $router->get('/panel/admin/categories/create/(\d+)', "SubcategoryController@create");
    $router->post('/panel/admin/categories/create/(\d+)', 'SubcategoryController@create');

    $router->get('/panel/admin/categories/edit/(\d+)', "CategoryController@edit");
    $router->post('/panel/admin/categories/edit/(\d+)', "CategoryController@edit");

    $router->get('/panel/admin/posts/create', "PostController@create");
    $router->post('/panel/admin/posts/create', "PostController@create");

    $router->get('/panel/admin/users', "UserController@show");

    $router->get('/panel/changePassword', "UserController@changePassword");
    $router->post('/panel/changePassword', "UserController@changePassword");

    $router->get('/panel/edit-profile', "UserController@editProfile");
    $router->post('/panel/edit-profile', "UserController@editProfile");

    $router->get('/panel/management/users', "UserController@show");
    $router->get('/panel/management/users/editAccess/(\d+)', "UserController@editAccess");
    $router->post('/panel/management/users/editAccess/(\d+)', "UserController@editAccess");
    $router->get('/panel/management/users/delete/(\d+)', "UserController@delete");

    $router->get('panel/management/categories', "CategoryController@show");
    $router->get('panel/management/categories/edit/(\d+)', "CategoryController@edit");
    $router->post('panel/management/categories/edit/(\d+)', "CategoryController@edit");
    $router->get('panel/management/categories/delete/(\d+)', "CategoryController@delete");

    $router->before('GET|POST', '/panel', 'LoginController@checkLogin');
    $router->before('GET|POST', '/panel/.*', 'LoginController@checkLogin');

    $router->before('GET|POST', '/panel/admin/.*', 'UserController@checkAdmin');
    $router->before('GET|POST', '/panel/management/.*', 'UserController@checkFullAdmin');

    $router->set404(function () {
//        header('HTTP/1.1 404 Not Found');
        echo 'route not found';
        // ... do something special here
    });

    //Run it!
    $router->run();
}