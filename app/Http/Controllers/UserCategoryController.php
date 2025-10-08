<?php

namespace App\Http\Controllers;

use App\Models\Product;

class UserCategoryController extends Controller
{
    public function ladies()
    {
        $products = Product::with('category')->get();
        return view('User.Category.Ladies', compact('products'));
    }

    public function gents()
    {
        $products = Product::with('category')->get();
        return view('User.Category.Gents', compact('products'));
    }

    public function kids()
    {
        $products = Product::with('category')->get();
        return view('User.Category.Kids', compact('products'));
    }
}
