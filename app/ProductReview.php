<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    const MAX_RATING = 5;

    protected $fillable = [
        'product_id',
        'user_id',
        'name',
        'company',
        'rating',
        'review'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

}
