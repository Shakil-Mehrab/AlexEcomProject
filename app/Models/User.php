<?php

namespace App\Models;

use App\Models\PaymentMethod;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gateway_customer_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    // get identifier
    public function getJWTIdentifier(){
        return $this->id;
    }
    public function getJWTCustomClaims(){
        return [];
    }
    public function cart(){
        return $this->belongsToMany(ProductVariation::class,'cart_user')//first table related and 2nd tabl jar dara ai relation hoiche
                    ->withPivot('quantity') //cart user theke quantity
                    ->withTimestamps();
    }
    public function addresses(){
        return $this->hasMany(Address::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function paymentMethods(){
        return $this->hasMany(PaymentMethod::class);
    }
}
