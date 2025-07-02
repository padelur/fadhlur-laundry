<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;

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
            'service_id' => 'required|exists:fadhlur_services,id',
            'weight' => 'required|numeric|min:1',
            'delivery_method' => 'required|in:manual,antar,jemput',
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $total = $service->price_per_kg * $validated['weight'];

        Order::create([
            'user_id' => 1, 
            'service_id' => $validated['service_id'],
            'weight' => $validated['weight'],
            'total_price' => $total,
            'delivery_method' => $validated['delivery_method'],
        ]);

        return redirect()->route('services.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}

