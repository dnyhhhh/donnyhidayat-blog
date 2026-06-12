<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user   = auth()->user();
        $ebooks  = $user->orders()->where('orderable_type', 'ebook')->latest()->get();
        $courses = $user->orders()->where('orderable_type', 'course')->latest()->get();
        $materis = $user->orders()->where('orderable_type', 'materi')->latest()->get();
        return view('member.dashboard', compact('ebooks', 'courses', 'materis'));
    }

    public function orderDetail(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);
        return view('member.order-detail', compact('order'));
    }
}
