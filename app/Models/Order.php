<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'farmer_id',
        'harvest_listing_id',
        'order_number',
        'quantity',
        'unit_price',
        'total_price',
        'fulfillment_method',
        'status',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'unit_price' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    // The buyer who placed the order
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // The farmer who owns the product
    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    // The harvest listing being ordered
    public function harvestListing()
    {
        return $this->belongsTo(
            HarvestListing::class,
            'harvest_listing_id'
        );
    }

    // Review for this order
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}