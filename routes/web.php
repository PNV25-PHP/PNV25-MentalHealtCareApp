
<?php
//Common Routers
$router->get('/sign-in', 'Common\SignInController@index');
$router->post('/api/sign-in', 'Common\SignInController@signIn');

//Patient Routers
$router->get('/patient/sign-up', 'Patient\SignUpController@index');
$router->post('/api/patient/sign-up', 'Patient\SignUpController@signUp');
$router->get('/patient/home', 'Patient\HomeController@index');

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


