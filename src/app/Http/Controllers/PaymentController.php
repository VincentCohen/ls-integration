<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function __construct() {
        //
    }

    public function pay($transactionId)
    {
        $results = DB::select("SELECT * FROM users");

        die;
//        return view('pay', ['transaction_id' => $transactionId]);
    }

    public function create(Request $request)
    {
        $order = $request->input('order');
        $shop  = $request->input('shop');

        $transactionId = hash('sha256',array_get($order, 'order_id') .  array_get($shop, 'id'));

        return response()->json(['payment_url' => url('/coin/pay/' . $transactionId)]);
    }

    /**
     * Displays available payment methods
     *
     * @return $this
     */
    public function methods() {

        $methods['payment_methods'] = [[
            'id' => 1,
            'title'  => 'Mastercard',
            'price_incl' => 1.00,
            'price_excl' => 1.21,
            'tax_rate' => 0.21,
            'icon' => 'mastercard'
        ],
            [
                'id' => 2,
                'title' => 'Visa',
                'price_incl' => 1.00,
                'price_excl' => 1.21,
                'tax_rate' => 0.21,
                'icon' => 'visa'
            ], [
                'id' => 3,
                'title' => 'Pay after delivery',
                'price_incl' => 1.00,
                'price_excl' => 1.21,
                'tax_rate' => 0.21,
                'icon' => 'https://static.webshopapp.com/assets/icon-payment-blank.png'
            ]];

        // Return it
        return (new Response(json_encode($methods), 201))
            ->header('Content-Type', 'application/json');
    }
}
