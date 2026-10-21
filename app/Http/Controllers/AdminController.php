<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return AdminResource::collection(Admin::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'admin_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $admin = Admin::create($validated);

        return new AdminResource($admin);
    }

    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);

        return new AdminResource($admin);
    }

    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'admin_name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:admins,email,' . $id . ',admin_id',
            'password' => 'sometimes|string|min:8',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $admin->update($validated);

        return new AdminResource($admin);
    }

    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        $admin->delete();

        return response()->json([
            'message' => 'Admin deleted successfully'
        ]);
    }
}
