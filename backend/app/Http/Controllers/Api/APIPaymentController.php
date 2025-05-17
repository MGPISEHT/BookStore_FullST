<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class APIPaymentController extends Controller
{
    public function getPayments()
    {
        $payments = Payment::all();
        return response()->json($payments);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
            'payment_date' => 'required|date',
        ]);

        $payment = Payment::create([
            'order_id' => $validated['order_id'],
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'transaction_id' => $validated['transaction_id'],
            'status' => $validated['status'],
            'created_at' => $validated['payment_date'],
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Payment added successfully.',
            'data' => $payment
        ], 201);
    }

    public function show(Payment $payment)
    {
        return response()->json($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
            'payment_date' => 'required|date',
        ]);

        $payment->update([
            'order_id' => $validated['order_id'],
            'payment_method' => $validated['payment_method'],
            'amount' => $validated['amount'],
            'transaction_id' => $validated['transaction_id'],
            'status' => $validated['status'],
            'created_at' => $validated['payment_date'],
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Payment updated successfully.',
            'data' => $payment
        ]);
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully.'
        ]);
    }
}
