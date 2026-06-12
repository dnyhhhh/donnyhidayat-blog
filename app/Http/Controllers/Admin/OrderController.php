<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use App\Mail\OrderRejected;

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
        Mail::to($order->user->email)->send(new OrderConfirmed($order));
        return back()->with('success', 'Order berhasil dikonfirmasi & email notifikasi terkirim.');
    }

    public function reject(Order $order)
    {
        $order->update(['status' => 'rejected']);
        Mail::to($order->user->email)->send(new OrderRejected($order));
        return back()->with('success', 'Order ditolak & email notifikasi terkirim.');
    }
}
