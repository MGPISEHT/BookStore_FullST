<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function indexOrder()
    {
        //
        $orders = Order::all(); // Fetch all orders
        // ឬប្រើ pagination: $categories = Category::paginate(10);
        return view('components.manageOrders', ['orders' => $orders]); // Pass $orders to view

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    // Store a new order
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'order_number' => 'required|string',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'shipping_address_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'shipping_method' => 'required|string',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show form to edit an order
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    // Update an existing order
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'order_number' => 'required|string',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
            'shipping_address_id' => 'required|integer',
            'payment_id' => 'required|integer',
            'shipping_method' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
