<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'name_ar', 'duration', 'description', 'description_ar', 'price', 'products', 'pinned_shop_num', 'pinned_products'];


    // public function packageShops()
    // {
    //     return $this->belongsToMany(User::class, 'package_shop', 'shop_id', 'package_id');
    // }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'package_id');
    }
}
