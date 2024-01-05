
<?php
//Common Routers
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');

//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');

//Admin Routers
$router->get('/admin/getDoctor', 'Admin\DoctorController@index');
$router->post('/admin/addDoctor', 'Admin\DoctorController@addDoctor');
$router->post('/admin/deleteDoctor/{doctorId}', 'Admin\DoctorController@deleteDoctor');

// $router->get('/admin/getDoctorById/{doctorId}', 'AdminController@getInfoDoctorById');
$router->post('/admin/updateDoctor', 'Admin\DoctorController@updateDoctor');

// Trong file web.php hoặc routes.php
// $router->get('/admin/doctor/{id}/edit', 'Admin\DoctorController@edit');
$router->get('/admin/getBooking', 'Admin\DoctorController@getBooking');
$router->get('/admin/getDashboard', 'Admin\DoctorController@getDashboard');
$router->get('/admin/getPatient', 'Admin\DoctorController@getpatient');



