<?php
$router->get('/', function () use ($router) {
    phpinfo();
});

$router->get('install','InstallController@install');
$router->get('install','InstallController@install');
$router->get('add-integration', 'InstallController@add');

$router->post('payment_methods', 'PaymentController@methods');

$router->get('pay/{id}', 'PaymentController@view');
$router->post('pay/{id}', 'PaymentController@create');
