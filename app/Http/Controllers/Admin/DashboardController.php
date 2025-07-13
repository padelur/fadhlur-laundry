<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\Payment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalOrders' => Order::count(),
            'totalPayments' => Payment::count(),
            'totalCustomers' => User::where('role', 'user')->count(),
            'totalRevenue' => Payment::where('status', 'paid')->sum('amount_paid'),
            'recentOrders' => Order::with(['user', 'service', 'payment'])
                ->latest()
                ->take(5)
                ->get()
        ]);
    }
}
