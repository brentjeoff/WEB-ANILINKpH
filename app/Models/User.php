<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Message;
use App\Models\FarmerSetting;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class User extends Authenticatable
{
    use Notifiable;

     protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'email',
        'address',
        'phone',
        'password',
        'farm_name',
            'farm_location',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function favorites()
        {
    return $this->hasMany(Favorite::class);
        }
    public function sentMessages()
        {
    return $this->hasMany(Message::class, 'sender_id');
        }

    public function receivedMessages()
        {
    return $this->hasMany(Message::class, 'receiver_id');
        }
        public function settings()
{
    return $this->hasOne(FarmerSetting::class);
}
public function notifications(): HasMany
{
    return $this->hasMany(Notification::class);
}
public function buyerSetting(): HasOne
{
    return $this->hasOne(BuyerSetting::class);
}
}
