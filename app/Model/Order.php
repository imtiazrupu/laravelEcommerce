<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Order extends Model
{
    const ORDER_PENDING = 0;
    const ORDER_CANCELED = 1;
    const ORDER_REJECTED = 2;
    const ORDER_DELIVERED = 3;
    const ORDER_SUCCESS = 4;

    protected $table = 'orders';

    protected $fillable = [
        'shipping_method_id',
        'shipping_id',
        'user_id',
        'payment_id',
        'invoice_no',
        'status',
        'total',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function orderDetails()
    {
        return $this
            ->hasMany(OrderDetails::class, 'order_id');
    }

    public function customer()
    {
        return $this
            ->belongsTo(User::class, 'user_id');
    }

    public function payment()
    {
        return $this
            ->belongsTo(Payment::class, 'payment_id');
    }

    public function shipping()
    {
        return $this
            ->belongsTo(Shipping::class, 'shipping_id');
    }
    public function shippingMethod()
    {
        return $this
            ->belongsTo(ShippingMethod::class, 'shipping_method_id');
    }
}
