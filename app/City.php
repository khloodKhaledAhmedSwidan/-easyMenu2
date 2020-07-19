<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
      protected $fillable = ['name','user_id'];

      public function branches()
      {
          return $this->hasMany(Branch::class);
      }
      public function user()
      {
          return $this->belongsTo(User::class);
      }
}
