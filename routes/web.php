<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Common Routers
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');

//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');

// Routers for Post 
$router->get('/Posts', 'Patient\NewPostController@index');
$router->post('/api/patient/Post/AddPost', 'Patient\NewPostController@addPost');
$router->post('/api/patient/Post/upload-image', 'Patient\NewPostController@uploadImage');
$router->post('/api/comment/addComment', 'Patient\NewPostController@addComment');