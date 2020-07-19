<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'branch_id','table_id', 'delivery', 'total_price', 'name', 'phone', 'cart_items', 'address', 'status', 'latitude', 'longitude', 'notes'
    ];

    public function branch()
    {
        return $this->belongsTo(User::class,'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }

    public function additions()
    {
        return $this->belongsToMany(Addition::class);
    }
}
