<?php

namespace App;
use App\BillingAddress;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    const CUSTOMER = 1;
    const ADMIN = 2;
    const SUPER_ADMIN = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email','type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class, 'user_id');
    }
}
