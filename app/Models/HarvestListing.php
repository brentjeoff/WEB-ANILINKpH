<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HarvestListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'product_name',
        'category',
        'farming_method',
        'description',
        'price',
        'quantity',
        'unit',
        'image',
        'farm_pickup',
        'local_delivery',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'farm_pickup' => 'boolean',
        'local_delivery' => 'boolean',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'farmer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'harvest_listing_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}