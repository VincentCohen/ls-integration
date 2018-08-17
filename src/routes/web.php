<?php

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

use Illuminate\Http\Response;

$router->get('/', function () use ($router) {
    try {
        $results = DB::select("SELECT * FROM users");
    }
    catch (\Exception $e) {
        echo ($e->getMessage());
    }
    phpinfo();
    return $router->app->version();
});


$router->get('/public', function () use ($router) {
    echo "/public";
    return $router->app->version();
});

$router->get('/install','InstallController@install');

$router->get('/add-integration', 'InstallController@add');

$router->get('/public/pay', function () use ($router) {
    return view('install');
});

$router->post('/ls/payment_methods', 'PaymentController@methods');

$router->get('/ls/pay/{id}', 'PaymentController@pay');
$router->post('/ls/payment', 'PaymentController@create');
