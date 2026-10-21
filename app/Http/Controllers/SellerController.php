<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Http\Resources\SellerResource;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index()
    {
        return SellerResource::collection(Seller::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'seller_name' => 'required|string|max:255',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $seller = Seller::create($validated);

        return new SellerResource($seller);
    }

    public function show(string $id)
    {
        $seller = Seller::findOrFail($id);

        return new SellerResource($seller);
    }

    public function update(Request $request, string $id)
    {
        $seller = Seller::findOrFail($id);

        $validated = $request->validate([
            'seller_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:sellers,email,' . $id . ',seller_id',
            'password' => 'sometimes|string|min:8',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $seller->update($validated);

        return new SellerResource($seller);
    }

    public function destroy(string $id)
    {
        $seller = Seller::findOrFail($id);

        $seller->delete();

        return response()->json([
            'message' => 'Seller deleted successfully'
        ]);
    }
}
