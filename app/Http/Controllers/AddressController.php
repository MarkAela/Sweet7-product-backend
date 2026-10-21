<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return AddressResource::collection(Address::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:users,id',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'is_default' => 'sometimes|boolean',
        ]);

        $address = Address::create($validated);

        return new AddressResource($address);
    }

    public function show(string $id)
    {
        $address = Address::findOrFail($id);

        return new AddressResource($address);
    }

    public function update(Request $request, string $id)
    {
        $address = Address::findOrFail($id);

        $validated = $request->validate([
            'customer_id' => 'sometimes|integer|exists:users,id',
            'street' => 'sometimes|string|max:255',
            'city' => 'sometimes|string|max:255',
            'province' => 'sometimes|string|max:255',
            'postal_code' => 'sometimes|string|max:20',
            'country' => 'sometimes|string|max:255',
            'is_default' => 'sometimes|boolean',
        ]);

        $address->update($validated);

        return new AddressResource($address);
    }

    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);

        $address->delete();

        return response()->json([
            'message' => 'Address deleted successfully'
        ]);
    }
}
