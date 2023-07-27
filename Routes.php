<?php

use Bramus\Router\BramusRouter;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new BramusRouter();
    $router->setNamespace('\App\Controllers');
    //Define routes
    $router->get('/posts', 'HomeController@showPosts');
    $router->get('/Authors', 'HomeController@showAuthors');
    $router->get('/admin/posts/edit/(\d+)', "PostController@editPost");
    $router->post('/admin/posts/edit/(\d+)', "PostController@editPost");


    $router->get('/login', "LoginController@form");
    $router->post('/login', "LoginController@form");
    $router->get('/logout', "LoginController@logout");
    $router->get('/add-menu', "panelController@addMenu");

    $router->get('/admin/posts/editPostsStatus', "PostController@editPostsStatus");
    $router->post('/admin/posts/editPostsStatus', "PostController@editPostsStatus");

    $router->get('/admin/authors/add-new', "AuthorController@addAuthor");
    $router->post('/admin/authors/add-new', "AuthorController@addAuthor");

    $router->get('/admin/authors/edit-author/(\d+)', "AuthorController@editAuthor");
    $router->post('/admin/authors/edit-author/(\d+)', "AuthorController@editAuthor");

    $router->get('/admin/authors/editAuthorsStatus', "AuthorController@editAuthorsStatus");
    $router->get('/admin/authors/editAuthorsStatus/approve/(\d+)', "AuthorController@approve");
    $router->get('/admin/authors/editAuthorsStatus/delete/(\d+)', "AuthorController@delete");

    $router->get('/admin/posts/editPostsStatus/approve/(\d+)', "PostController@approve");
    $router->get('/admin/posts/editPostsStatus/delete/(\d+)', "PostController@delete");

    $router->post('/add-menu', "panelController@addMenu");

    $router->get('/register', "RegisterController@register");

    $router->post('/register', "RegisterController@register");

    $router->get('/emailVerification', "RegisterController@emailVerification");
    $router->post('/emailVerification', "RegisterController@emailVerification");

    $router->get('/admin', "PanelController@panel");
    $router->get('/admin/category', "CategoryController@create");
    $router->post('/admin/category', 'CategoryController@create');

    $router->get('/admin/category/list/add-sub/(\d+)', "SubcategoryController@create");
    $router->post('/admin/category/list/add-sub/(\d+)', "SubcategoryController@create");

    $router->get('/admin/post/create', "PostController@create");
    $router->post('/admin/post/create', "PostController@create");

    $router->get('/admin/user/list', "UserController@show");
    $router->get('/admin/changePassword', "UserController@changePassword");
    $router->post('/admin/changePassword', "UserController@changePassword");
    $router->get('/admin/editProfile', "UserController@editProfile");
    $router->post('/admin/editProfile', "UserController@editProfile");
    $router->get('/admin/user/list/editAccess/(\d+)', "UserController@editAccess");
    $router->post('/admin/user/list/editAccess/(\d+)', "UserController@editAccess");
    $router->get('/admin/user/list/delete/(\d+)', "UserController@delete");

    $router->get('admin/category/list', "CategoryController@show");
    $router->get('admin/category/list/edit/(\d+)', "CategoryController@edit");
    $router->post('admin/category/list/edit/(\d+)', "CategoryController@edit");
    $router->get('admin/category/list/delete/(\d+)', "CategoryController@delete");

    $router->before('GET|POST', '/admin', 'LoginController@checkLogin');
    $router->before('GET|POST', '/admin/.*', 'LoginController@checkLogin');

    $router->before('GET|POST', '/admin/user', 'UserController@checkAdmin');
    $router->before('GET|POST', '/admin/user/.*', 'UserController@checkAdmin');

    $router->before('GET|POST', '/admin/authors/editAuthorsStatus', "AuthorController@checkFullAdmin");
    $router->before('GET|POST', '/admin/authors/.*', "AuthorController@checkAdmin");

    $router->before('GET|POST', '/admin/posts/editPostsStatus', "PostController@checkAdmin");

    $router->set404(function () {
//        header('HTTP/1.1 404 Not Found');
        echo 'route not found';
        // ... do something special here
    });

    //Run it!
    $router->run();
}
