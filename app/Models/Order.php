<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_number', 'status', 'subtotal', 'shipping_cost', 'total',
        'shipping_full_name', 'shipping_phone', 'shipping_address_line1', 
        'shipping_address_line2', 'shipping_city', 'shipping_postal_code',
        'shipping_country', 'payment_method', 'payment_status', 'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'date_time',
        'subtotal' => 'decimal: 2',
        'shipping_cost' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
