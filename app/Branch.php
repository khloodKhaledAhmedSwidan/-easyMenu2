<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branch extends Authenticatable
{
    protected $fillable = ['address', 'user_id', 'address_ar', 'phone','email', 'city_id','password'];


    public function restaurant()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'branch_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }
       protected $hidden = [
        'password', 
    ];

}
