<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Project\Router($_SERVER["REQUEST_URI"]);
// HOMEPAGE
$router->get('/', "ViewController@showHome");

// USER
// - login
$router->get('/login/', "ViewController@showLogin");
$router->post('/login/', "UserController@login");

// - register
$router->get('/register/', "ViewController@showRegister");
$router->post('/register/', "UserController@register");

// - logout
$router->get('/logout/', "UserController@logout");

// BLOG (CRUD)
// - create new blog
$router->get('/create-new-blog/', "ViewController@showCreateBlog");
$router->post('/storeBlog/', "BlogController@store");

// - update blog
$router->get('/update-blog/:id_blog/:id_user/', "ViewController@showUpdateBlog");
$router->post('/updateBlog/:id_blog/', "BlogController@update");

// - deleet blog
$router->get('/delete-blog/:id_blog/', "BlogController@delete");

$router->run();
