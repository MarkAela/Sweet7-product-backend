<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Resources\CartItemResource;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CartItemResource::collection(CartItem::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::create($validated);

        return new CartItemResource($cartItem);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        return new CartItemResource($cartItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'sometimes|integer|exists:users,id',
            'product_id' => 'sometimes|integer|exists:products,product_id',
            'quantity' => 'sometimes|integer|min:1',
        ]);

        $cartItem->update($validated);

        return new CartItemResource($cartItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $cartItem->delete();

        return response()->json([
            'message' => 'Cart item deleted successfully'
        ]);
    }
}
