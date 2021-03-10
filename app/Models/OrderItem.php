<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'name',
        'quantity',
        'unit',
        'unit_price_no_vat',
        'total_price_no_vat',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getAmountByMultiplyingQuantityAndPrice()
    {
        return $this->quantity * $this->unit_price_no_vat;
    }
}
