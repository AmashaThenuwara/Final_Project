<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;
use App\Models\User;
use App\Models\Notification;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $items = json_decode($order->products, true);
        return view('admin.order.show', compact('order', 'items'));
    }

    public function confirm($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'confirmed';
        $order->save();

        Notification::create([
            'user_id' => $order->user_id,
            'message' => "Your order {$order->id} has been confirmed by admin.",
        ]);
        return redirect()->route('admin.orders.index')->with('success', 'Order confirmed and message sent.');
    }

    public function dispatch($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'dispatched';
        $order->save();

        Notification::create([
            'user_id' => $order->user_id,
            'message' => "Your order {$order->id} has been handed over to the delivery service.",
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Order marked as dispatched and customer notified.');
    }
}

