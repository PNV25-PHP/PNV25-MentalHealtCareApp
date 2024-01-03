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

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;



$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Common Routers
$router->get('/homepage', 'Common\ProfileController@viewHomePage');
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');
$router->post('/api/update/profile', 'Common\ProfileController@updateInformationUser');
//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');
$router->get('/header', '\resource\views\layouts\HtmlNavbar');

$router->get('/view-profile', 'Common\ProfileController@index');
$router->get('/edit-profile', 'Common\ProfileController@editProfile');
$router->post('/api/edit-profile', 'Common\ProfileController@updateInformationUser');
// $router->post('/upload-image', )
