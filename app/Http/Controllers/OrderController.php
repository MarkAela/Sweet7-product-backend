<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:users,id',
            'total_amount' => 'required|numeric|min:0',
            'order_status' => 'sometimes|string|max:255',
        ]);

        $order = Order::create($validated);

        return new OrderResource($order);
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);

        return new OrderResource($order);
    }

    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|integer|exists:users,id',
            'total_amount' => 'sometimes|numeric|min:0',
            'order_status' => 'sometimes|string|max:255',
        ]);

        $order->update($validated);

        return new OrderResource($order);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ]);
    }
}
