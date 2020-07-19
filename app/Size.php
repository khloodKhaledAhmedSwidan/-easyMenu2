<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['meal_id', 'size', 'size_ar', 'price', 'calories'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
