
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
// Routers for Post 
$router->get('/patient/post', 'Patient\NewPostController@index');// /patient/post
$router->post('/api/patient/Post/AddPost', 'Patient\NewPostController@addPost');
$router->post('/api/patient/Post/upload-image', 'Patient\NewPostController@uploadImage');
$router->post('/api/comment/addComment', 'Patient\NewPostController@addComment');
//Admin Routers Doctor
$router->get('/admin/getDoctor', 'Admin\DoctorController@index');
$router->post('/admin/addDoctor', 'Admin\DoctorController@addDoctor');
$router->post('/admin/deleteDoctor/{doctorId}', 'Admin\DoctorController@deleteDoctor');
$router->post('/admin/updateDoctor', 'Admin\DoctorController@updateDoctor');
//Admin Routers Patient
$router->get('/admin/getPatient', 'Admin\PatientController@index');
$router->post('/admin/addPatient', 'Admin\PatientController@addPatient');
$router->post('/admin/updatePatient', 'Admin\PatientController@updatePatient');
$router->post('/admin/deletePatient/{patientID}', 'Admin\PatientController@deletePatient');
// other
$router->get('/admin/getBooking', 'Admin\DoctorController@getBooking');
$router->get('/admin/getDashboard', 'Admin\DoctorController@getDashboard');
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
$router->post('/api/patient/search', 'Patient\SearchController@search');
//Patient_history_booking
$router->post('/api/patient/processHistoryBooking', 'Common\ProfileController@processHistoryBooking');
$router->get('/patient/history-booking', 'Common\ProfileController@patientHistoryBooking');
// upload image
$router->post('/upload_image', 'Common\UploadController@uploadImage12');