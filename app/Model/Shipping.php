<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    protected $guarded = [];

    public function customer()
    {
        return $this
            ->belongsTo(Customer::class, 'user_id');
    }

    public function order()
    {
        return $this
            ->belongsTo(Order::class, 'shipping_id');
    }
}
