<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Misc\CustomerScope;
use App\User;

class Customer extends User
{
    protected $table = 'users';
    const CUSTOMER = 1;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CustomerScope);
    }

    public function shippings()
    {
        return $this->hasMany(Shipping::class, 'user_id');
    }
}
