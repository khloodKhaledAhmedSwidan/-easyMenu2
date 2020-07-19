<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscription;
class SellerCode extends Model
{
    protected $fillable = ['name','percentage','seller_name'];

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}
