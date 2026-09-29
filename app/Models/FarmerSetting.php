<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FarmerSetting extends Model
{
    protected $fillable = [
        'user_id',
        'new_order_alerts',
        'direct_messages',
        'weekly_sales_summaries',
        'allow_farm_pickups',
        'local_delivery',
    ];

    protected $casts = [
        'new_order_alerts' => 'boolean',
        'direct_messages' => 'boolean',
        'weekly_sales_summaries' => 'boolean',
        'allow_farm_pickups' => 'boolean',
        'local_delivery' => 'boolean',
    ];
}