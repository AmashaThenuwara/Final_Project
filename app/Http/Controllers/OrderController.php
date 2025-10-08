<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();

        $totalItems = array_sum($cart);
        $totalPrice = $products->sum(fn($p) => $p->price * $cart[$p->id]);

        return view('User.Cart.checkout', compact('totalItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        return app(CartController::class)->placeOrder($request);
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        foreach ($orders as $order) {
            $order->products = json_decode($order->products, true);
        }
        return view('User.Order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $order->products = json_decode($order->products, true);
        return view('User.Order.show', compact('order'));
    }
}
