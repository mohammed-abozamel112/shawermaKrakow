<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = new OrderCollection(Order::all());
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $product = Product::find($request->input('product_id'));
        $details[] = $request->input([
            'product_id' => $request->product_id,
            'quantity' => $request->input('quantity'),
            'name' => $product->name,
            'price_before_discount' => $product->price_before_discount,
            'total' => $product->price_after_discount * $request->input('quantity'),
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'shawerma_krakows_id' => $request->shawerma_krakows_id,

            'detail' => $details,
            'shipping' => $request->shipping,
            'total_amount' => $request->total_amount,
        ]);
        return response()->json([
            $order,
            'message' => "Your order has been successfully placed!"
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
