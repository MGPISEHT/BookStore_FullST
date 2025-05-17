<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class APIShippingAddressController extends Controller
{
    public function index()
    {
        $shippingAddresses = ShippingAddress::all();
        return response()->json($shippingAddresses);
    }

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

        $shippingAddress = ShippingAddress::create($validated);

        return response()->json([
            'message' => 'Shipping address created successfully.',
            'data' => $shippingAddress
        ], 201);
    }

    public function show($id)
    {
        $shippingAddress = ShippingAddress::find($id);

        if (!$shippingAddress) {
            return response()->json(['message' => 'Shipping address not found.'], 404);
        }

        return response()->json($shippingAddress);
    }

    public function update(Request $request, $id)
    {
        $shippingAddress = ShippingAddress::find($id);

        if (!$shippingAddress) {
            return response()->json(['message' => 'Shipping address not found.'], 404);
        }

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

        $shippingAddress->update($validated);

        return response()->json([
            'message' => 'Shipping address updated successfully.',
            'data' => $shippingAddress
        ]);
    }

    public function destroy($id)
    {
        $shippingAddress = ShippingAddress::find($id);

        if (!$shippingAddress) {
            return response()->json(['message' => 'Shipping address not found.'], 404);
        }

        $shippingAddress->delete();

        return response()->json(['message' => 'Shipping address deleted successfully.']);
    }
}
