<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'fadhlur_payments';

    protected $fillable = [
        'order_id',
        'amount_paid',
        'method',
        'status',
        'bukti_pembayaran',
        'paid_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
