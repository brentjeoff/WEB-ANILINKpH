<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'buyer_id',
        'farmer_id',
        'order_id',
        'harvest_listing_id',
        'rating',
        'comment',
    ];

    /*
    |--------------------------------------------------------------------------
    | Buyer
    |--------------------------------------------------------------------------
    */

    public function buyer()
    {
        return $this->belongsTo(
            User::class,
            'buyer_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Farmer
    |--------------------------------------------------------------------------
    */

    public function farmer()
    {
        return $this->belongsTo(
            User::class,
            'farmer_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Order
    |--------------------------------------------------------------------------
    */

    public function order()
    {
        return $this->belongsTo(
            Order::class,
            'order_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Harvest Listing
    |--------------------------------------------------------------------------
    */

    public function listing()
    {
        return $this->belongsTo(
            HarvestListing::class,
            'harvest_listing_id'
        );
    }
}