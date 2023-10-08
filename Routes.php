<?php

use Bramus\Router\BramusRouter;

if (isset($_SERVER['REQUEST_METHOD'])) {
    $router = new BramusRouter();
    $router->setNamespace('\App\Controllers');
    //Define routes
    $router->get('/', 'HomeController@homePage');
    $router->get('/logout', "SigninController@logout");

    //authentication
    $router->get('/sign-up', "SignupController@form");
    $router->post('/sign-up', "SignupController@form");

    $router->get('/emailVerification', "RegisterController@emailVerification");
    $router->post('/emailVerification', "RegisterController@emailVerification");
    $router->get('/sign-in', "SigninController@form");
    $router->post('/sign-in', "SigninController@form");
    $router->get('/panel', 'PanelController@dashboard');
    $router->get('/aaron-book', 'HomeController@aaronBook');

    //post-categories
    $router->get('/panel/add-post-category', "PostCategoryController@create");
    $router->post('/panel/add-post-category', "PostCategoryController@create");
    $router->get('/panel/post-categories', "PostCategoryController@show");
    $router->get('/panel/post-categories/(\d+)/posts', "PostCategoryController@categoryPosts");
    $router->before('GET|POST', '/panel/add-post-category', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/post-categories', 'SigninController@checkAdmin');
    $router->get('/panel/posts-categories-management', "PostCategoryController@management");
    $router->get('/panel/posts-categories-management/delete/(\d+)', "PostCategoryController@delete");
    $router->get('/panel/posts-categories-management/edit/(\d+)', "PostCategoryController@edit");
    $router->post('/panel/posts-categories-management/edit/(\d+)', "PostCategoryController@edit");
    $router->before('GET|POST', '/panel/posts-categories-management', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/posts-categories-management/.*', 'SigninController@checkAdmin');

    //posts
    $router->get('/posts/(\d+)/like', "PostController@like");
    $router->get('/posts/(\d+)', "HomeController@postSingle");
    $router->get('/posts/(\d+)/add-comment', "PostCommentController@create");
    $router->post('/posts/(\d+)/add-comment', "PostCommentController@create");
    $router->before("POST", '/posts/(\d+)/add-comment', 'SigninController@checkSignin');
    $router->get('/posts/(\d+)/reply/(\d+)', "PostCommentController@reply");
    $router->post('/posts/(\d+)/reply/(\d+)', "PostCommentController@reply");
    $router->before('GET|POST', '/posts/(\d+)/reply/(\d+)', "SigninController@checkSignin");
    $router->get('/panel/add-post', "PostController@create");
    $router->post('/panel/add-post', "PostController@create");
    $router->before('GET|POST', '/panel/add-post', 'SigninController@checkAdmin');
    $router->get('/panel/my-posts', "PostController@adminPosts");
    $router->get('/panel/my-posts/edit/(\d+)', "PostController@edit");
    $router->post('/panel/my-posts/edit/(\d+)', "PostController@edit");
    $router->get('/panel/my-posts/delete/(\d+)', "PostController@remove");
    $router->before('GET|POST', '/panel/my-posts', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/my-posts/.*', 'SigninController@checkAdmin');
    $router->get('/panel/posts-management', "PostController@management");
    $router->post('/panel/posts-management', "PostController@management");
    $router->get('/panel/posts-management/(\d+)', "PostController@showSingle");
    $router->get('/panel/posts-management/approve/(\d+)', "PostController@approve");
    $router->get('/panel/posts-management/delete/(\d+)', "PostController@delete");
    $router->get('/panel/posts-management/edit/(\d+)', "PostController@edit");
    $router->post('/panel/posts-management/edit/(\d+)', "PostController@edit");
    $router->before('GET|POST', '/panel/posts-management', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/posts-management/.*', 'SigninController@checkFullAdmin');

    //posts-comments
    $router->get('/panel/posts-comments-management', "PostCommentController@management");
    $router->get('/panel/posts-comments-management/delete/(\d+)', "PostCommentController@delete");
    $router->get('/panel/posts-comments-management/delete-reply/(\d+)', "PostCommentController@delete");
    $router->get('/panel/posts-comments-management/approve/(\d+)', "PostCommentController@approve");
    $router->get('/panel/posts-comments-management/approve-reply/(\d+)', "PostCommentController@approve");
    $router->before('GET|POST', '/panel/posts-comments-management', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/posts-comments-management/.*', 'SigninController@checkAdmin');

    //podcasts
    $router->get('/podcasts', 'HomeController@showPodcasts');
    $router->get('/podcasts/(\d+)', 'HomeController@podcastSingle');
    $router->get('/panel/add-podcast', "PodcastController@create");
    $router->post('/panel/add-podcast', "PodcastController@create");
    $router->get('/panel/podcasts-management', "PodcastController@management");
    $router->get('/panel/podcasts-management/(\d+)', "PodcastController@podcastSingle");
    $router->get('/panel/podcasts-management/approve/(\d+)', "PodcastController@approve");
    $router->get('/panel/podcasts-management/delete/(\d+)', "PodcastController@delete");
    $router->get('/panel/my-podcasts', "PodcastController@userPodcasts");
    $router->get('/panel/my-podcasts/delete/(\d+)', "PodcastController@delete");
    $router->get('/panel/my-podcasts/edit/(\d+)', "PodcastController@edit");
    $router->post('/panel/my-podcasts/edit/(\d+)', "PodcastController@edit");
    $router->get('/panel/my-podcasts/(\d+)', "PodcastController@podcastSingle");
    $router->before('GET|POST', '/panel/add-podcast', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/podcasts-management', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/podcasts-management/.*', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/my-podcasts', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/my-podcasts/.*', 'SigninController@checkAdmin');

    //podcast-comments
    $router->get('/podcasts/(\d+)/add-comment', "PodcastCommentController@create");
    $router->post('/podcasts/(\d+)/add-comment', "PodcastCommentController@create");
    $router->get('/podcasts/(\d+)/reply/(\d+)', "PodcastCommentController@reply");
    $router->post('/podcasts/(\d+)/reply/(\d+)', "PodcastCommentController@reply");
    $router->before('GET|POST', '/podcasts/(\d+)/.*', "SinginController@checkSignin");
    $router->get('/panel/podcasts-comments-management', "PodcastCommentController@management");
    $router->get('/panel/podcasts-comments-management/approve/(\d+)', "PodcastCommentController@approve");
    $router->get('/panel/podcasts-comments-management/approve-reply/(\d+)', "PodcastCommentController@approve");
    $router->get('/panel/podcasts-comments-management/delete/(\d+)', "PodcastCommentController@delete");
    $router->get('/panel/podcasts-comments-management/delete-reply/(\d+)', "PodcastCommentController@delete");
    $router->before('GET|POST', '/panel/podcasts-comments-management', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/podcasts-comments-management/.*', 'SigninController@checkAdmin');

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
    $router->before('GET|POST', '/panel/books-management', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/books-management/.*', 'SigninController@checkAdmin');

    //authors
    $router->get('/panel/add-author', "AuthorController@create");
    $router->post('/panel/add-author', "AuthorController@create");
    $router->before('GET|POST', '/panel/add-author', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/add-author/.*', 'SigninController@checkAdmin');
    $router->get('/panel/my-authors', "AuthorController@adminAuthors");
    $router->get('/panel/my-authors/edit/(\d+)', "AuthorController@edit");
    $router->get('/panel/my-authors/delete/(\d+)', "AuthorController@remove");
    $router->before('GET|POST', '/panel/my-authors', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/my-authors/.*', 'SigninController@checkAdmin');
    $router->get('/panel/authors-management', "AuthorController@management");
    $router->get('/panel/authors-management/approve/(\d+)', "AuthorController@approve");
    $router->get('/panel/authors-management/delete/(\d+)', "AuthorController@delete");
    $router->get('/panel/authors-management/edit/(\d+)', "AuthorController@edit");
    $router->post('/panel/authors-management/edit/(\d+)', "AuthorController@edit");
    $router->before('GET|POST', '/panel/authors-management', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/authors-management/.*', 'SigninController@checkFullAdmin');

    //Profile
    $router->get('/panel/edit-profile', "ProfileController@edit");
    $router->post('/panel/edit-profile', "ProfileController@edit");
    $router->get('/panel/edit-personal-info', "ProfileController@editPersonalInfo");
    $router->post('/panel/edit-personal-info', "ProfileController@editPersonalInfo");
    $router->get('/panel/edit-social-media', "ProfileController@editSocialMedia");
    $router->post('/panel/edit-social-media', "ProfileController@editSocialMedia");
    $router->get('/panel/change-password', "ProfileController@changePassword");
    $router->post('/panel/change-password', "ProfileController@changePassword");

    //categories
    $router->get('/panel/add-category', "CategoryController@create");
    $router->post('/panel/add-category', 'CategoryController@create');
    $router->before('GET|POST', '/panel/add-category', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/add-category/.*', 'SigninController@checkAdmin');
    $router->get('panel/my-categories', "CategoryController@userCategories");
    $router->get('panel/my-categories/edit/(\d+)', "CategoryController@edit");
    $router->post('panel/my-categories/edit/(\d+)', "CategoryController@edit");
    $router->get('panel/my-categories/delete/(\d+)', "CategoryController@delete");
    $router->before('GET|POST', '/panel/my-categories', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/my-categories/.*', 'SigninController@checkAdmin');
    $router->get('panel/categories-management', "CategoryController@management");
    $router->get('panel/categories-management/edit/(\d+)', "CategoryController@edit");
    $router->post('panel/categories-management/edit/(\d+)', "CategoryController@edit");
    $router->get('panel/categories-management/approve/(\d+)', "CategoryController@approve");
    $router->get('panel/categories-management/delete/(\d+)', "CategoryController@delete");
    $router->before('GET|POST', '/panel/categories-management', 'SigninController@checkFullAdmin');
    $router->before('GET|POST', '/panel/categories-management/.*', 'SigninController@checkFullAdmin');

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
    $router->get('/panel/users-management/(\d+)', "UserController@userSingle");
    $router->get('/panel/users-management/block/(\d+)', "UserController@block");
    $router->get('/panel/users-management/change-access/(\d+)', "UserController@changeAccess");
    $router->get('/panel/users-management/delete/(\d+)', "UserController@delete");
    $router->before('GET|POST', '/panel/users-management', 'SigninController@checkAdmin');
    $router->before('GET|POST', '/panel/users-management/.*', 'SigninController@checkAdmin');

    //Signin Middleware
    $router->before('GET|POST', '/panel', 'SigninController@checkSignin');
    $router->before('GET|POST', '/panel/.*', 'SigninController@checkSignin');

    //404
    $router->set404(function () {
//        header('HTTP/1.1 404 Not Found');
        pageNotFound();
        // ... do something special here
    });

    //Run it!
    $router->run();
}
