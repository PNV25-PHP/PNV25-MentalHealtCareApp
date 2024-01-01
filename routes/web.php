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

//Connect DB
$router->get('/database', 'Common\checkconnectDb');


  
//Common Routers
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');

//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');
$router->get('/header', 'layouts\HtmlNavbar');

$router->get('/findByEmail', 'Common\ProfileController@findByEmail');
$router->post('/api/updateUser', 'Common\ProfileController@updateUser');

$router->get('/edit-profile', 'Common\ProfileController@index');
// $router->post('/api/edit-profile', 'Common\ProfileComposer@updateUser');


