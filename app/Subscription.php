<?php

namespace App;

use App\SellerCode;
use App\Coupon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $fillable = ['package_id', 'user_id', 'seller_code_id', 'discount_code_id ', 'invoice_id', 'price', 'end_at', 'status', 'finished', 'image'];
    protected $dates  = ['end_at'];
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function sellerCode()
    {
        return $this->belongsTo(SellerCode::class, 'seller_code_id');
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'discount_code_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
