<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $categories = Category::paginate(30);
        return view('admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name'      => $request->name,
            'admin_id'  => auth()->id()
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'You have created successfully.');
    }

    // Display the specified resource.
    public function show(Category $category)
    {
        $item = $category;
        return view('admin.categories.show', compact('category', 'item'));
    }

    // Show the form for editing the specified resource.
    public function edit(Category $category)
    {
        $item = $category;
        return view('admin.categories.edit', compact('category', 'item'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'You have updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'You have delete successfully.');
    }
}
