<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Payment::with('order.user', 'order.service')
            ->where('status', 'paid')
            ->latest();


        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('paid_at', [$request->from, $request->to]);
        }

        $payments = $query->paginate(10);


        $total = $query->sum('amount_paid');

        return view('admin.reports.index', compact('payments', 'total'));
    }
}

