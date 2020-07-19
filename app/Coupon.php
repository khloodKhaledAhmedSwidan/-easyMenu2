<?php

namespace App;

use App\Subscription;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['name', 'percentage'];
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
