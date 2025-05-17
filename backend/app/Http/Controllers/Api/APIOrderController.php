<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class APIOrderController extends Controller
{
    public function getOrders()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'order_number' => 'required|string',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'shipping_address_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'shipping_method' => 'required|string',
        ]);

        $order = Order::create($validated);

        return response()->json([
            'message' => 'Order created successfully.',
            'data' => $order
        ], 201);
    }

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required|integer',
            'order_number' => 'required|string',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'shipping_address_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'shipping_method' => 'required|string',
        ]);

        $order->update($validated);

        return response()->json([
            'message' => 'Order updated successfully.',
            'data' => $order
        ]);
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found.'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully.']);
    }
}
