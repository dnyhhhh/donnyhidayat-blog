<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers'    => User::where('is_admin', false)->count(),
            'totalEbooks'   => Ebook::count(),
            'totalCourses'  => Course::count(),
            'pendingOrders' => Order::where('status', 'pending')->count(),
            'recentOrders'  => Order::with('user')->latest()->take(5)->get(),
        ]);
    }
}
