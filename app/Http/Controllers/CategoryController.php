<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return view('admin.category.index', compact('categories'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Category::create($request->post());
        return redirect()->route('categories.index')->with('success', 'Category has been created successfully.');
    }
    public function show(Category $category)
    {
        $services = Service::where('category_id', $category->id)->get();
        return view('admin.category.show', compact('category', 'services'));
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $category->fill($request->post())->save();
        return redirect()->route('categories.index')->with('success', 'Category has been updated successfully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category has been deleted successfully');
    }
}
