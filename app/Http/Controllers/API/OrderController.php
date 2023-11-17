<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //Get data from form
        $totalprice = $request->totalCart;
        $name = $request->name;
        $lastname = $request->lastname;
        $address = $request->address;
        $phone = $request->phone;
        $status = 0;
        $dishes = $request->dishes;

        
        //Validate
        //controllo se i dati non rispettano le validazione
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|min:6',
            'totalCart' => 'required|',
        ]);

        if ($validator->fails()) {
            return redirect('http://localhost:5174/order')
                ->withErrors($validator)
                ->withInput();
            } else {
                //Save into db
                $order = new Order();
                $order->name = $name;
                $order->lastname = $lastname;
                $order->address = $address;
                $order->phone = $phone;
                $order->status = $status;
                $order->totalprice = $totalprice;
                $order->save();
                //update dish_order
                foreach($dishes as $dish){
                    $order->dishes()->attach($dish['id'], ['quantity' => $dish['counter']]);
                } 
            }


        //sending response
        if ($request->expectsJson()) {
            return response()->json(['redirectUrl' => route('payment.transaction', ['total' => $totalprice])]);
        }
    }
}
