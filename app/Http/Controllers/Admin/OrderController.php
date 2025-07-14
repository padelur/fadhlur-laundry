<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $orders = Order::with(['user.customer', 'service'])
            ->when($status, fn($query) => $query->where('status', $status))
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders', 'status'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,proses,selesai'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan diperbarui.');
    }

    public function show($id)
    {
        $order = Order::with(['user.customer', 'service'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
}
