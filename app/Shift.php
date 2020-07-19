<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'restaurant_id', 'name_ar', 'name', 'from', 'to',
    ];

    public function restaurant()
    {
        return $this->belongsTo(User::class, 'restaurant_id');
    }
}
