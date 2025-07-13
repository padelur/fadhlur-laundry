<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalServices' => Service::count(),
            'totalOrders' => Order::count(),
            'totalPayments' => Payment::count(),
            'recentOrders' => Order::latest()->with(['user', 'service'])->take(5)->get()
        ]);
    }
}
