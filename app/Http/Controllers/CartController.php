<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        return view('User.Cart.index', compact('products', 'cart'));
    }

    public function add(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + 1;
        session()->put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'Product added to cart!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Product removed from cart.');
    }

    public function placeOrder(Request $request)
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        $items = $products->map(function ($product) use ($cart) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $cart[$product->id],
                'image' => $product->image_url,
            ];
        });

        $total = $items->sum(fn($item) => $item['price'] * $item['quantity']);

        Order::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'products' => json_encode($items),
            'total' => $total,
            'status' => 'pending',
        ]);

        session()->forget('cart');

        return redirect()->route('user.profile')->with('success', 'Your order has been placed!');
    }

}
