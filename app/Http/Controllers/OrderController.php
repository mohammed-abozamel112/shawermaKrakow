<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all orders with their related order items and shawermakrakow
        $orders = Order::with([
            'orderItems' => function ($query) {
                // Eager load the product relationship for each order item
                // and select only the id, name, and weight fields for the product
                $query->with('product:id,name,weight')
                    ->select('order_id', 'quantity', 'subtotal', 'product_id');
            },
            'shawermakrakow' => function ($query) {
                // Eager load the shawermakrakow relationship for each order
                // and select only the id and name fields for the shawermakrakow
                $query->select('id', 'name');
            }
        ])
            // Select only the necessary fields for each order
            ->select(
                'id',
                'token',
                'shipping',
                'total',
                'total_with_shipping',
                'email',
                'phone_number',
                'status',
                'first_name',
                'last_name',
                'address',
                'city',
                'shawermakrakows_id'
            )
            ->get();

        // Return the orders as a JSON response
        return response()->json([
            'orders' => $orders,
        ]);
    }
    function show(Request $request)
    {
        $token = $request->token;

        if (!$token) {
            return response()->json(['' => 'Token is required'], 400);
        }

        $order = Order::with([
            'orderItems' => function ($query) {
                $query->with('product:id,name,weight')
                    ->select('order_id', 'quantity', 'subtotal', 'product_id');
            },
            'shawermakrakow' => function ($query) {
                // Eager load the shawermakrakow relationship for each order
                // and select only the id and name fields for the shawermakrakow
                $query->select('id', 'name');
            }
        ])->where('token', $token)
            ->select(
                'id',
                'token',
                'shipping',
                'total',
                'total_with_shipping',
                'email',
                'phone_number',
                'status',
                'first_name',
                'last_name',
                'address',
                'city',
                'shawermakrakows_id'
            )->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'order' => $order,
        ]);
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
            'expire_date' => 'required|date_format:m/y',
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
            if ($request->has('shipping')) {
                $shipping_val = $request->shipping;
            } else {
                $shipping_val = 0.2;
            }
            // Calculate shipping cost
            $shipping = $total * $shipping_val;

            // Create order
            $total_with_shipping = $total + $shipping;

            // Create order
            $order = Order::create([
                'token' => Str::uuid(16),
                'shipping' => $shipping_val,
                'total' => $total,
                'total_with_shipping' => $total_with_shipping,
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


            //send mail to  customer with order details and adminstrator with order details

            $mail = new PHPMailer(true);
            $name = $request->first_name . " " . $request->last_name;
            $email = $request->email;

            /* Email SMTP Settings */
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');

            //Recipients
            $mail->setFrom('hassan@shawermakrakow.com', 'Shawerma krakow');
            $mail->addAddress($email, $name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Thank you for your Order';
            $mail->Body = 'Hi' . ' ' . $name . ', we are getting your order ready .<br> <b> Here is The Id Of Your Order : </b> ' . $order->token;

            $mail->send();

            /* end mail */
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
        // Get the order
        $order = Order::findOrFail($id);
        // Delete the order and all associated order items
        $order->orderItems()->delete();
        $order->delete();
        // Return a success message
        return response()->json('Order deleted', 200);
    }
}
