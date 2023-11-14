<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        dd($request);
        $total = $request->totalCart;

        return view('admin.orders.index', compact('total'));
        //return response()->json(['total' => $total]);
    }
}
