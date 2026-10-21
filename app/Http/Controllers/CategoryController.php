<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categories_name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $category = Category::create($validated);

        return new CategoryResource($category);
    }

    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return new CategoryResource($category);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'categories_name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $category->update($validated);

        return new CategoryResource($category);
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully'
        ]);
    }
}
