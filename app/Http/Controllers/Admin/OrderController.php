<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(20);
        return view('admin.order-index', compact('orders'));
    }

    public function approve(Order $order)
    {
        $order->update(['status' => 'paid', 'paid_at' => now()]);
        return back()->with('success', 'Order berhasil dikonfirmasi.');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'rejected']);
        return back()->with('success', 'Order ditolak.');
    }
}
