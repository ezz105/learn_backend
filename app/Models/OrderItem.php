<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'artisan_id', 'quantity', 'price_per_unit', 'total_price', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function artisan()
    {
        return $this->belongsTo(User::class);
    }

}
