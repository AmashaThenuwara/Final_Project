<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.inventory.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.inventory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'size' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.inventory.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.inventory.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'size' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image_url) {
                Storage::disk('public')->delete($product->image_url);
            }
            $validated['image_url'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.inventory.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }

        $product->delete();

        return redirect()->route('admin.inventory.index')->with('success', 'Product deleted successfully.');
    }

    public function showByCategory($name)
    {
        $category = Category::where('name', $name)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();
        return view('User.Category.index', compact('category', 'products'));
    }
}
