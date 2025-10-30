<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id','item_type','item_id','name','quantity','price','details'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'details' => 'array',
    ];

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
}


