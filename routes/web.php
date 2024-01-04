
<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use App\Http\Controllers\Admin\DoctorController;
try {
    // Kiểm tra kết nối cơ sở dữ liệu
    DB::connection()->getPdo();

    // Kiểm tra trạng thái kết nối
    if (DB::connection()->getDatabaseName()) {
        echo 'Kết nối cơ sở dữ liệu thành công!';
    } else {
        echo 'Không thể kết nối đến cơ sở dữ liệu.';
    }
} catch (\Exception $e) {
    echo 'Lỗi kết nối cơ sở dữ liệu: ' . $e->getMessage();
} 
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

//Admin Routers
//Admin Routers
$router->get('/admin/getDoctor', 'Admin\DoctorController@index');
$router->post('/admin/addDoctor', 'Admin\DoctorController@addDoctor');

// $router->get('/admin/getDoctorById/{doctorId}', 'AdminController@getInfoDoctorById');
$router->post('/admin/updateDoctor/{doctorId}', 'AdminController@updateDoctor');

// Trong file web.php hoặc routes.php
// $router->get('/admin/doctor/{id}/edit', 'Admin\DoctorController@edit');




