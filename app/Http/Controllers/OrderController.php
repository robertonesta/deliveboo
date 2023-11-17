<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Dish;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        //l'ordine dove il dish ha il restaurant_id = all'user_id
        //$dishes = Dish::where('restaurant_id', $user_id)->get();

        $orders = Dish::join('dish_order', 'dishes.id', '=', 'dish_order.dish_id')
        ->join('orders', 'dish_order.order_id', '=', 'orders.id')
        ->where('dishes.restaurant_id', '=', $user_id)
        ->select('orders.*', 'dishes.name AS dish_name', 'dish_order.quantity', 'dishes.price')
        ->get();

        $merged = [];
        foreach ($orders as $order) {
            $orderId = $order->id;
            $order_name = $order->name;
            $order_lastname = $order->lastname;
            $order_address = $order->address;
            $order_phone = $order->phone;
            $order_status = $order->status;
            $order_totalprice = $order->totalprice;
            // Se l'ordine non è ancora presente nell'array, lo aggiungiamo
            if (!isset($merged[$orderId])) {
                $merged[$orderId] = [
                    'order_id' => $orderId,
                    'order_name' => $order_name,
                    'order_lastname' => $order_lastname,
                    'order_address' => $order_address,
                    'order_phone' => $order_phone,
                    'order_status' => $order_status,
                    'order_totalprice' => $order_totalprice,
                    'dishes' => [],
                ];
            }
        
            // Aggiungiamo l'articolo all'ordine corrente
            $merged[$orderId]['dishes'][] = [
                'dish_name' => $order->dish_name,
                'price' => $order->price,
                'quantity' => $order->quantity,
            ];
        
        }
        //dd($merged);

        return view('admin.orders.index', compact('merged'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
