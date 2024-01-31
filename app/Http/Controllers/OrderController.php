<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'numeric',
            'email' => 'required|email',
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|max:20',
            'address' => 'required',
            'city' => 'required|string|min:3',
            'country' => 'required|string|min:3',
            'post_code' => 'required',
            'payment_method' => 'required',
            'card_number' => 'required|numeric',
            'expire_date' => 'required',
            'security_code' => 'required|digits:3',
        ]);

        try {
            // Get cart items
            $cartItems = \Cart::getContent()->toArray();
            $cartItemsArray = [];
            $total = 0;

            foreach ($cartItems as $cartItem) {
                $subtotal = $cartItem['price'] * $cartItem['quantity'];
                $product = Product::findOrFail($cartItem['id']);
                $cartItemArray = [
                    'id' => $cartItem['id'],
                    'name' => $cartItem['name'],
                    'price' => $cartItem['price'],
                    'quantity' => $cartItem['quantity'],
                    'stockQuantity' => $product->quantity,
                    'weight' => $product->weight,
                    'image' => $product->image,
                    'subtotal' => $subtotal,
                ];
                $cartItemsArray[] = $cartItemArray;
                $total += $subtotal;
            }

            // Create order
            $order = Order::create([
                'token' => Str::random(16),
                'total' => $total,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'post_code' => $request->post_code,
                'payment_method' => $request->payment_method,
                'card_number' => $request->card_number,
                'expire_date' => $request->expire_date,
                'security_code' => $request->security_code,
            ]);

            // Save order items
            $orderItems = array_map(function ($item) use ($order) {
                $orderItem = OrderItems::create([
                    'order_id' => $order->id,
                    'token' => $order->token,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['subtotal'],
                ]);

                // Decrease the stock quantity
                $product = Product::findOrFail($item['id']);
                $product->quantity -= $item['quantity'];
                $product->save();

                return $orderItem;
            }, $cartItemsArray);

            return response()->json([
                "success" => true,
                "message" => "Order Created",
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the order by its
        $order = Order::findOrFail($id);

        // Check if the order exists
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update the status of the order
        $order->status = $request->status; // assuming the status is sent in the request
        $order->save();

        // Return a JSON response
        return response()->json(['message' => 'Order status updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
