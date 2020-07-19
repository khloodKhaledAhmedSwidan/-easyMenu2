<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['restaurant_id', 'image'];

    public function restaurant()
    {
        return $this->belongsTo(User::class, 'restaurant_id');
    }
}
