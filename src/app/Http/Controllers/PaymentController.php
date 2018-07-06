<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
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

    public function pay($transactionId)
    {
        return view('pay', ['transaction_id' => $transactionId]);
    }

    public function create(Request $request)
    {
        $order = $request->input('order');
        $shop  = $request->input('shop');

        $transactionId = hash('sha256',array_get($order, 'order_id') .  array_get($shop, 'id'));

        return response()->json(['payment_url' => url('/coin/pay/' . $transactionId)]);
    }
}
