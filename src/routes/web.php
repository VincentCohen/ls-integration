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
    return $router->app->version();
});


$router->get('/public', function () use ($router) {
    echo "/public";
    return $router->app->version();
});


$router->get('/shop', function () use ($router) {
    $endpoint = env('LS_API_HOST', true) . 'en/shop.json';
    $guzzle = new GuzzleHttp\Client();

    $response = $guzzle->get($endpoint);

    echo "<pre>";
    var_dump($response->getStatusCode());
    var_dump(json_decode($response->getBody()->getContents(), 1));
    echo "</pre>";
    die;

    return $router->app->version();
});

$router->get('/install', function () use ($router) {
    return view('install');
});

$router->get('/add-integration', function () use ($router) {
    /**
     * https://developers.lightspeedhq.com/ecom/tutorials/create-a-payment-service-integration/
     */


    $endpoint = env('LS_API_HOST', true) . 'en/external_services.json';
    $app_host = env('APP_HOST', true) . 'coin';
    $guzzle = new GuzzleHttp\Client();

    $response = $guzzle->post($endpoint, [
        GuzzleHttp\RequestOptions::JSON => [
            'externalService' => [
                'type' => 'payment',
                'name' => 'LS Coin',
                'isActive' => true,
                'urlEndpoint' => $app_host,
                'rateEstimate' => false,
            ]
        ]
    ]);

    var_dump ($response->getBody());

    return view('installed');
});


$router->get('/public/pay', function () use ($router) {
    return view('install');
});

$router->post('/coin/payment_methods', function () use ($router) {
    $content = "
    {
  \"payment_methods\": [
    {
      \"id\": 1,
      \"title\": \"Mastercard\",
      \"price_incl\":6.05,
      \"price_excl\": 5.00,
      \"tax_rate\": 0.21,
      \"icon\": \"mastercard\"
    },
    {
      \"id\": 2,
      \"title\": \"Visa\",
      \"price_incl\":6.05,
      \"price_excl\": 5.00,
      \"tax_rate\": 0.21,
      \"icon\": \"visa\"
    },
    {
      \"id\": 3,
      \"title\": \"Pay after delivery\",
      \"price_incl\":6.05,
      \"price_excl\": 5.00,
      \"tax_rate\": 0.21,
      \"icon\": \"https://yourdomain.com/icon-pay-after-delivery.png\"
    }
  ]
}";


    // Return it
    return (new Response($content, 201))
        ->header('Content-Type', 'application/json');
});

$router->get('/pay', function () use ($router) {
    return view('pay');
});
