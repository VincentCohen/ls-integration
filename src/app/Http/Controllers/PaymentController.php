<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Response;

class PaymentController extends Controller
{

    public function __construct() {
        //
    }

    public function view($orderId)
    {
        return view('pay', ['order_id' => $orderId]);
    }

    public function create($orderId)
    {
        $transaction = Transaction::where('order_id', $orderId)->count();

        if (!$transaction) {
            $transaction = new Transaction();

            $transaction->order_id = $orderId;
            $transaction->status = 'paid';
            $transaction->price_incl = 0;
            $transaction->price_excl = 0;
            $transaction->price_tax = 0;
            $transaction->currency = 'EUR';
            $transaction->raw = json_encode([]);

            $transaction->save();
        }

        return $transaction;
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
