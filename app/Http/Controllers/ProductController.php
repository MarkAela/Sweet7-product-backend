<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     * Admin and User can view products.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created product.
     * Only Admin can create products.
     */
    public function store(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Forbidden. Admin access required.'
            ], 403);
        }

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_image' => 'nullable|string',
            'product_price' => 'required|numeric|min:0',
            'seller_id' => 'required|integer',
        ]);

        $product = Product::create($validated);

        return new ProductResource($product);
    }

    /**
     * Display a specific product.
     * Admin and User can view product details.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }

    /**
     * Update a product.
     * Only Admin can update products.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Forbidden. Admin access required.'
            ], 403);
        }

        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'sometimes|string|max:255',
            'product_description' => 'sometimes|string',
            'product_image' => 'nullable|string',
            'product_price' => 'sometimes|numeric|min:0',
            'seller_id' => 'sometimes|integer',
        ]);

        $product->update($validated);

        return new ProductResource($product);
    }

    /**
     * Delete a product.
     * Only Admin can delete products.
     */
    public function destroy(string $id)
    {
        if (request()->user()->role !== 'admin') {
            return response()->json([
                'message' => 'Forbidden. Admin access required.'
            ], 403);
        }

        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
