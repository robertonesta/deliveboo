<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request){
        $total = $request->totalCart;
        if ($request->expectsJson()) {
            return response()->json(['redirectUrl' => route('payment.transaction', ['total' => $total])]);
        }


    }
}
