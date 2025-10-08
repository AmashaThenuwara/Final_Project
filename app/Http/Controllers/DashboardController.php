<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $ordersToday = Order::whereDate('created_at', Carbon::today())->count();
        $users = User::count();
        $revenue = Order::whereDate('created_at', Carbon::today())->sum('total');

        // Weekly order data
        $orderLabels = [];
        $orderCounts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $orderLabels[] = $date->format('D');
            $orderCounts[] = Order::whereDate('created_at', $date)->count();
        }

        return view('Admin.Dashboard.dashboard', compact(
            'totalProducts', 'ordersToday', 'users', 'revenue',
            'orderLabels', 'orderCounts'
        ));
    }

}
