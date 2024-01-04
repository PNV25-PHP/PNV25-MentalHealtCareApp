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
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');
$router->post('/update/profile', 'Common\ProfileController@updateInformationUser');
//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');
$router->get('/header', '\resource\views\layouts\HtmlNavbar');
$router->get('/patient/list-doctor', 'Patient\ListDoctorController@index');
$router->get('/patient/list-doctor/booking', 'Patient\BookingController@index');
$router->post('/patient/list-doctor/booking/time', 'Patient\BookingController@checkTime');
$router->get('/view-profile', 'Common\ProfileController@viewProfile');
$router->get('/edit-profile', 'Common\ProfileController@index');
$router->post('edit-profile', 'Common\ProfileController@updateInformationUser');
$router->post('/patient/list-doctor/booking', 'Patient\BookingController@booking');
