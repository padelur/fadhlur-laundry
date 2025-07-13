<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $payments = Payment::with('order.user', 'order.service')
            ->when($status, fn($query) => $query->where('status', $status))
            ->latest()
            ->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    public function show($id)
    {
        $payment = Payment::with('order.user', 'order.service')->findOrFail($id);
        return view('admin.payments.show', compact('payment'));
    }

    public function verify($id)
{
    $payment = Payment::with('order')->findOrFail($id);

    if ($payment->status === 'unpaid' && $payment->method === 'transfer') {

        $payment->update([
            'status'  => 'paid',
            'paid_at' => now(),
        ]);


        if ($payment->order) {
            $payment->order->update([
                'status' => 'proses'
            ]);
        }

        return redirect()
            ->route('admin.payments.show', $payment->id)
            ->with('success', 'Pembayaran berhasil diverifikasi! Status pesanan kini PROSES.');
    }

    return back()->with('error', 'Pembayaran tidak valid untuk diverifikasi.');
}
}
