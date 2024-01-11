
<?php

use Illuminate\Support\Facades\DB;

require_once __DIR__ . '/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));



$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->withFacades();





$app->configure('app');



// $app->middleware([
//     App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

/*lả
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/


$app->router->group([
    'namespace' => 'App\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/web.php';
});

return $app;


$app = new Laravel\Lumen\Application(
    realpath(__DIR__.'/../')
);

// Load environment variables
$app->configure('app');
$app->configure('database');

// ...

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    $app->basePath()
))->bootstrap();

$app->withFacades();
$app->withEloquent();
