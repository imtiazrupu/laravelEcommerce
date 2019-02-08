<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class orderDetails extends Model
{
    protected $guarded = [];
    //    public $incrementing = false;

        public function order()
        {
            return $this->belongsTo(Order::class, 'order_id');
        }

        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id');
        }
}
