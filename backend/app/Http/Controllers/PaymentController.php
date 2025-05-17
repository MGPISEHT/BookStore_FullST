<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function indexPayment()
    {
        $payment = Payment::all(); // Fetch all payments
        return view('components.managePayments', ['payments' => $payment]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
            'payment_date' => 'required|date',
        ]);

        Payment::create([
            'order_id' => $request->order_id,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'transaction_id' => $request->transaction_id,
            'status' => $request->status,
            'created_at' => $request->payment_date,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Payment added successfully.');
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string|max:255',
            'status' => 'required|in:pending,completed,failed',
            'payment_date' => 'required|date',
        ]);

        $payment->update([
            'order_id' => $request->order_id,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            'transaction_id' => $request->transaction_id,
            'status' => $request->status,
            'updated_at' => now(),
            'created_at' => $request->payment_date, // Optional: Only update if payment date changes original creation
        ]);

        return redirect()->back()->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back()->with('success', 'Payment deleted successfully.');
    }
}
