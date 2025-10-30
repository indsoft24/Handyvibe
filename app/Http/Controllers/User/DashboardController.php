<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Some existing databases may not have user_id on orders; guard queries accordingly
        if (Schema::hasTable('orders') && Schema::hasColumn('orders', 'user_id')) {
            $orders = Order::where('user_id', $userId)->latest()->limit(5)->get();
            $ordersCount = Order::where('user_id', $userId)->count();
        } else {
            $orders = collect();
            $ordersCount = 0;
        }

        $bookings = Booking::where('user_id', $userId)->latest()->limit(5)->get();
        $stats = [
            'orders' => $ordersCount,
            'bookings' => Booking::where('user_id', $userId)->count(),
        ];
        return view('user.dashboard', compact('orders','bookings','stats'));
    }
}


