<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ebook;
use App\Models\Course;
use App\Models\Materi;

class DashboardController extends Controller
{
    public function index()
    {
        $user      = auth()->user();
        $hasBundle = $user->hasBundle();

        if ($hasBundle) {
            $ebooks  = Ebook::where('is_published', true)->latest()->get();
            $courses = Course::where('is_published', true)->latest()->get();
            $materis = Materi::where('is_published', true)->latest()->get();
        } else {
            $ebooks  = $user->orders()->where('orderable_type', 'ebook')->where('status', 'paid')->latest()->get();
            $courses = $user->orders()->where('orderable_type', 'course')->where('status', 'paid')->latest()->get();
            $materis = $user->orders()->where('orderable_type', 'materi')->where('status', 'paid')->latest()->get();
        }

        $bundleOrder = $user->orders()->where('orderable_type', 'bundle')->where('status', 'paid')->first();
        $allOrders   = $user->orders()->latest()->get();

        return view('member.dashboard', compact('ebooks', 'courses', 'materis', 'hasBundle', 'bundleOrder', 'allOrders'));
    }

    public function orderDetail(Order $order)
    {
        abort_unless($order->user_id === auth()->id(), 403);
        return view('member.order-detail', compact('order'));
    }
}
