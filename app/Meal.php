<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'name_ar', 'name', 'content_ar', 'content', 'finished', 'image', 'price', 'calories'
    ];

    public function restaurant()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function additions()
    {
        return $this->belongsToMany(Addition::class);
    }
}
