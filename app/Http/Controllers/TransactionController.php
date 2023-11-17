<?php

namespace App\Http\Controllers;


use Braintree\Gateway;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function showTransaction($total)
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        return view('payment.transaction', compact('token', 'total'));
    }
}
