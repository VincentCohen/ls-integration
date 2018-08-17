<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;


class InstallController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * https://developers.lightspeedhq.com/ecom/tutorials/create-a-payment-service-integration/
     */
    public function add()
    {
        $endpoint = env('LS_API_HOST', true) . 'en/external_services.json';
        $app_host = env('APP_HOST', true) . 'coin';
        $guzzle = new Client();
        $response = false;
        try
        {
            $response = $guzzle->post($endpoint, [
                RequestOptions::JSON => [
                    'externalService' => [
                        'type'         => 'payment',
                        'name'         => 'LS Coin',
                        'isActive'     => true,
                        'urlEndpoint'  => $app_host,
                        'rateEstimate' => false,
                    ]
                ]
            ]);
        }
        catch (\Exception $e) {
            //
        }

        if (!$response) {
            // error out
            return view('add_failed');
        }

        return view('add');
    }

    public function install(Request $request)
    {
        return view('install');
    }
}
