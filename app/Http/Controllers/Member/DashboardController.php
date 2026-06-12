<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->with([])->paginate(10);
        return view('member.dashboard', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);
        return view('member.order-detail', compact('order'));
    }
}
