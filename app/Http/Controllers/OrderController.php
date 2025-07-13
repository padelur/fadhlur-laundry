<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function create(Request $request)
    {
        $service = Service::findOrFail($request->service);
        return view('orders.create', compact('service'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'service_id'       => 'required|exists:fadhlur_services,id',
            'weight'           => 'required|numeric|min:1',
            'delivery_method'  => 'required|in:manual,antar,jemput',
            'method'           => 'required|in:cash,transfer',

            'bukti_pembayaran' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $service = Service::findOrFail($validated['service_id']);
        $total   = $service->price_per_kg * $validated['weight'];


        $order = Order::create([
            'user_id'         => Auth::id(),
            'service_id'      => $validated['service_id'],
            'weight'          => $validated['weight'],
            'total_price'     => $total,
            'delivery_method' => $validated['delivery_method'],
        ]);


        $buktiPath = null;
        if ($request->method === 'transfer') {
            if (!$request->hasFile('bukti_pembayaran')) {
                return back()->withErrors(['bukti_pembayaran' => 'Bukti transfer wajib diunggah.']);
            }
            $buktiPath = $request->file('bukti_pembayaran')
                                 ->store('bukti_pembayaran', 'public');
        }


        Payment::create([
            'order_id'         => $order->id,
            'amount_paid'      => $total,
            'method'           => $validated['method'],
            'status'           => $validated['method'] === 'cash' ? 'paid' : 'unpaid',
            'bukti_pembayaran' => $buktiPath,
            'paid_at'          => now(),
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function history()
{
    $orders = Order::with('service', 'payment')
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

    return view('orders.history', compact('orders'));
}

public function show($id)
{
    $order = Order::with('service', 'payment')->where('user_id', Auth::id())->findOrFail($id);
    return view('orders.show', compact('order'));
}

}

