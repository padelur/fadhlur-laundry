<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'fadhlur_orders';
    protected $fillable = [
        'user_id', 'service_id', 'weight', 'total_price', 'status',
        'pickup_method', 'pickup_address', 'pickup_phone',
        'delivery_method', 'delivery_address', 'delivery_phone',
        'pickup_notes', 'delivery_notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }
}

