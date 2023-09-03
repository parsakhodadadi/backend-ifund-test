<?php

use Bramus\Router\BramusRouter;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new BramusRouter();
    $router->setNamespace('\App\Controllers');
    //Define routes
    $router->get('/', 'HomeController@frontend');
    $router->get('/panel', 'HomeController@showPosts');
    $router->get('/logout', "LoginController@logout");

    //authentication
    $router->get('/register', "RegisterController@register");
    $router->post('/register', "RegisterController@register");
    $router->get('/emailVerification', "RegisterController@emailVerification");
    $router->post('/emailVerification', "RegisterController@emailVerification");
    $router->get('/login', "LoginController@form");
    $router->post('/login', "LoginController@form");

    //posts
    $router->get('/panel/add-post', "PostController@create");
    $router->post('/panel/add-post', "PostController@create");
    $router->before('GET|POST', '/panel/add-post', 'LoginController@checkAdmin');
    $router->get('/panel/my-posts', "PostController@adminPosts");
    $router->get('/panel/my-posts/edit/(\d+)', "PostController@edit");
    $router->post('/panel/my-posts/edit/(\d+)', "PostController@edit");
    $router->get('/panel/my-posts/delete/(\d+)', "PostController@remove");
    $router->before('GET|POST', '/panel/my-posts', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/my-posts/.*', 'LoginController@checkAdmin');
    $router->get('/panel/posts-management', "PostController@management");
    $router->post('/panel/posts-management', "PostController@management");
    $router->get('/panel/posts-management/approve/(\d+)', "PostController@approve");
    $router->get('/panel/posts-management/delete/(\d+)', "PostController@delete");
    $router->get('/panel/posts-management/edit/(\d+)', "PostController@edit");
    $router->post('/panel/posts-management/edit/(\d+)', "PostController@edit");
    $router->before('GET|POST', '/panel/posts-management', 'LoginController@checkFullAdmin');
    $router->before('GET|POST', '/panel/posts-management/.*', 'LoginController@checkFullAdmin');

    //books
    $router->get('/panel/add-book', "BookController@create");
    $router->post('/panel/add-book', "BookController@create");
    $router->get('/panel/my-books', "BookController@userBooks");
    $router->get('/panel/my-books/edit/(\d+)', "BookController@edit");
    $router->post('/panel/my-books/edit/(\d+)', "BookController@edit");
    $router->get('/panel/my-books/delete/(\d+)', "BookController@delete");
    $router->get('/panel/books-management', "BookController@management");
    $router->get('/panel/books-management/approve/(\d+)', "BookController@approve");
    $router->get('/panel/books-management/delete/(\d+)', "BookController@delete");
    $router->before('GET|POST', '/panel/books-management', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/books-management/.*', 'LoginController@checkAdmin');

    //authors
    $router->get('/panel/add-author', "AuthorController@create");
    $router->post('/panel/add-author', "AuthorController@create");
    $router->before('GET|POST', '/panel/add-author', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/add-author/.*', 'LoginController@checkAdmin');
    $router->get('/panel/my-authors', "AuthorController@adminAuthors");
    $router->get('/panel/my-authors/edit/(\d+)', "AuthorController@edit");
    $router->get('/panel/my-authors/delete/(\d+)', "AuthorController@remove");
    $router->before('GET|POST', '/panel/my-authors', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/my-authors/.*', 'LoginController@checkAdmin');
    $router->get('/panel/authors-management', "AuthorController@management");
    $router->get('/panel/authors-management/approve/(\d+)', "AuthorController@approve");
    $router->get('/panel/authors-management/delete/(\d+)', "AuthorController@delete");
    $router->get('/panel/authors-management/edit/(\d+)', "AuthorController@edit");
    $router->post('/panel/authors-management/edit/(\d+)', "AuthorController@edit");
    $router->before('GET|POST', '/panel/authors-management', 'LoginController@checkFullAdmin');
    $router->before('GET|POST', '/panel/authors-management/.*', 'LoginController@checkFullAdmin');

    //Profile
    $router->get('/panel/edit-profile', "ProfileController@edit");
    $router->post('/panel/edit-profile', "ProfileController@edit");

    //categories
    $router->get('/panel/add-category', "CategoryController@create");
    $router->post('/panel/add-category', 'CategoryController@create');
    $router->before('GET|POST', '/panel/add-category', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/add-category/.*', 'LoginController@checkAdmin');
    $router->get('panel/my-categories', "CategoryController@userCategories");
    $router->get('panel/my-categories/edit/(\d+)', "CategoryController@edit");
    $router->post('panel/my-categories/edit/(\d+)', "CategoryController@edit");
    $router->get('panel/my-categories/delete/(\d+)', "CategoryController@delete");
    $router->before('GET|POST', '/panel/my-categories', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/my-categories/.*', 'LoginController@checkAdmin');
    $router->get('panel/categories-management', "CategoryController@management");
    $router->get('panel/categories-management/edit/(\d+)', "CategoryController@edit");
    $router->post('panel/categories-management/edit/(\d+)', "CategoryController@edit");
    $router->get('panel/categories-management/approve/(\d+)', "CategoryController@approve");
    $router->get('panel/categories-management/delete/(\d+)', "CategoryController@delete");
    $router->before('GET|POST', '/panel/categories-management', 'LoginController@checkFullAdmin');
    $router->before('GET|POST', '/panel/categories-management/.*', 'LoginController@checkFullAdmin');

    //subjects
    $router->get('/panel/my-categories/(\d+)/add-subject', "SubjectController@create");
    $router->post('/panel/my-categories/(\d+)/add-subject', "SubjectController@create");
    $router->get('/panel/my-categories/(\d+)/subjects', "SubjectController@userSubjects");
    $router->get('/panel/my-categories/(\d+)/subjects/edit/(\d+)', "SubjectController@edit");
    $router->post('/panel/my-categories/(\d+)/subjects/edit/(\d+)', "SubjectController@edit");
    $router->get('/panel/my-categories/(\d+)/subjects/delete/(\d+)', "SubjectController@delete");
    $router->get('/panel/categories-management/(\d+)/add-subject', "SubjectController@create");
    $router->post('/panel/categories-management/(\d+)/add-subject', "SubjectController@create");
    $router->get('/panel/categories-management/(\d+)/subjects', "SubjectController@management");
    $router->get('/panel/categories-management/(\d+)/subjects/edit/(\d+)', "SubjectController@edit");
    $router->post('/panel/categories-management/(\d+)/subjects/edit/(\d+)', "SubjectController@edit");
    $router->get('/panel/categories-management/(\d+)/subjects/delete/(\d+)', "SubjectController@delete");

    //Users
    $router->get('/panel/users-management', "UserController@management");
    $router->get('/panel/users-management/edit-access/(\d+)', "UserController@editAccess");
    $router->post('/panel/users-management/edit-access/(\d+)', "UserController@editAccess");
    $router->get('/panel/users-management/delete/(\d+)', "UserController@delete");
    $router->before('GET|POST', '/panel/users-management', 'LoginController@checkAdmin');
    $router->before('GET|POST', '/panel/users-management/.*', 'LoginController@checkAdmin');

    //Change Password
    $router->get('/panel/change-password', "ChangePasswordController@changePassword");
    $router->post('/panel/change-password', "ChangePasswordController@changePassword");

    //Login Middleware
    $router->before('GET|POST', '/panel', 'LoginController@checkLogin');
    $router->before('GET|POST', '/panel/.*', 'LoginController@checkLogin');

    //404
    $router->set404(function () {
//        header('HTTP/1.1 404 Not Found');
        echo 'route not found';
        // ... do something special here
    });

    //Run it!
    $router->run();
}
