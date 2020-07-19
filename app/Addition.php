<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addition extends Model
{
    protected $fillable = ['name', 'name_ar', 'type', 'price'];

    public function restaurant()
    {
        return $this->belongsTo(User::class);
    }
}
