<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            //change status of order
            $order = Order::orderByDesc('created_at')->first();
            if ($order) {
                $order->status = 1;
                $order->save();
            }
            //return back()->with('message', 'Transazione avvenuta con successo.');
            //return redirect('http://localhost:5174/')->with('message', 'Transazione avvenuta con successo.');
            return redirect('http://localhost:5174/?message=Transazione+avvenuta+con+successo');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('C\'è stato un errore:' . $result->message);
        }
    }
}
