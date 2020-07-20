<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_ar',
        'password',
        'phone_number',
        'image',
        'link',
        'vat',
        'active',
        'email',
        'branchs',
        'delivery',
        'delivery_price',
        'minimum',
        'delivery_from',
        'delivery_to',
        'description',
        'restaurant_id',
        'type',
        'address',
        'address_ar',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
// protected $appends = ['image'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function branchOrders()
    {
        return $this->hasMany(Order::class, 'branch_id');
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function additions()
    {
        return $this->hasMany(Addition::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class, 'restaurant_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'user_id');
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'restaurant_id');
    }
//       public  function getimageAttribute($image){
//        return asset('public/'.$image);
//    }

public function restaurantBranches()
{
    return $this->hasMany(User::class, 'restaurant_id');
}
public function user()
{
    return $this->belongsTo(User::class);
}
public function restaurant()
{
    return $this->belongsTo(User::class,'restaurant_id');
}
public function city()
{
    return $this->belongsTo(City::class);
}
}
