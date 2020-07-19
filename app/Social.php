<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['facebook', 'twitter', 'snapchat', 'instagram', 'youtube', 'google_plus'];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
