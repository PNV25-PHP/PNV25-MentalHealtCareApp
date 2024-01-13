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
    if ($_SERVER['REQUEST_URI'] === '/') {
        header('Location: /login');
        exit;
    }
});

//Common Routers
$router->get('/login', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');
$router->post('/api/update/profile', 'Common\ProfileController@updateInformationUser');
//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');
$router->get('/header', '\resource\views\layouts\HtmlNavbar');
//booking
$router->get('/patient/list-doctor', 'Patient\ListDoctorController@index');
$router->get('/patient/list-doctor/booking', 'Patient\BookingController@index');
$router->post('/patient/list-doctor/booking/time', 'Patient\BookingController@checkTime');
$router->post('/patient/list-doctor/booking', 'Patient\BookingController@booking');
//profile
$router->get('/view-profile', 'Common\ProfileController@index');
$router->get('/edit-profile', 'Common\ProfileController@editProfile');
$router->post('/api/edit-profile', 'Common\ProfileController@updateInformationUser');
//search
$router->get('/patient/search', 'Patient\SearchController@index');
//Patient_history_booking
$router->post('/api/patient/processHistoryBooking', 'Common\ProfileController@processHistoryBooking');
$router->get('/patient/history-booking', 'Common\ProfileController@patientHistoryBooking');
