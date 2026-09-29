<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuyerSetting extends Model
{
    protected $fillable = [
        'user_id',
        'order_updates',
        'messages',
        'marketplace_updates',
        'default_fulfillment_method',
    ];

    protected $casts = [
        'order_updates' => 'boolean',
        'messages' => 'boolean',
        'marketplace_updates' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}