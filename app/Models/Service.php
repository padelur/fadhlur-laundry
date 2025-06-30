<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price_per_kg'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'service_id');
    }
}

