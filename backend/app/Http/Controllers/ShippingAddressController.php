<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    protected $shippingAddress;

    public function __construct(ShippingAddress $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
    public function indexShipping()
    {
        //
        $shippingAddress = ShippingAddress::all(); // Fetch all orders
        // ឬប្រើ pagination: $categories = Category::paginate(10);
        return view('components.manageShipping', ['shipping_addresses' => $shippingAddress]); // Pass $orders to view

    }
    // Display a listing of the shipping addresses

    // Show the form for creating a new shipping address
    public function create()
    {
        return view('shipping_addresses.create');
    }

    // Store a newly created shipping address in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'recipient_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        ShippingAddress::create($validated);

        return redirect()->route('shipping_addresses.index')->with('success', 'Shipping address created successfully.');
    }

    // Display the specified shipping address
    public function show($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        return view('shipping_addresses.show', compact('shippingAddress'));
    }

    // Show the form for editing the specified shipping address
    public function edit($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        return view('shipping_addresses.edit', compact('shippingAddress'));
    }

    // Update the specified shipping address in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'recipient_name' => 'required|string|max:255',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->update($validated);

        return redirect()->route('shipping_addresses.index')->with('success', 'Shipping address updated successfully.');
    }

    // Remove the specified shipping address from storage
    public function destroy($id)
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->delete();

        return redirect()->route('shipping_addresses.index')->with('success', 'Shipping address deleted successfully.');
    }
}
