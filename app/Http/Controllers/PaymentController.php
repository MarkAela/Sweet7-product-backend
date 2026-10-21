<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return PaymentResource::collection(Payment::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer|exists:orders,order_id',
            'payment_method' => 'required|string|max:255',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string|max:255',
            'transaction_ref' => 'nullable|string|max:255',
        ]);

        $payment = Payment::create($validated);

        return new PaymentResource($payment);
    }

    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);

        return new PaymentResource($payment);
    }

    public function update(Request $request, string $id)
    {
        $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|integer|exists:orders,order_id',
            'payment_method' => 'sometimes|string|max:255',
            'payment_date' => 'sometimes|date',
            'amount' => 'sometimes|numeric|min:0',
            'payment_status' => 'sometimes|string|max:255',
            'transaction_ref' => 'nullable|string|max:255',
        ]);

        $payment->update($validated);

        return new PaymentResource($payment);
    }

    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully'
        ]);
    }
}
