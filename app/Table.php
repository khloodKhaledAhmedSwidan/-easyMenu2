<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = ['branch_id','name','user_id'];

    public function branch()
    {
        return $this->belongsTo(User::class,'branch_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
