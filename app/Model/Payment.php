<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    const PENDING = 0;
    const SUCCESS = 1;
    const REFUND = 2;
    const CANCELED = 3;
    const REJECTED = 4;
    const REFUND_REQUEST = 5;
    const CASH_ON_DELIVERY = 'cash_on_delivery';
    const CREDIT_CARD = 'credit_card';

    protected $table = 'payments';

    protected $fillable = [
        'type',
        'status',
        'date_time'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'payment_id');
    }
}
