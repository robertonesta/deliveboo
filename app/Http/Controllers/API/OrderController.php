<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $total = $request->totalCart;
        if ($request->expectsJson()) {
/*             return response()->json([
                'total' => $total,
                'view' => 'http://127.0.0.1:8000/transaction'
            ]); */
            return response()->json(['redirectUrl' => route('payment.transaction', ['total' => $total])]);
        }
        //return view('payment.transaction', compact('total'));

    }
}
