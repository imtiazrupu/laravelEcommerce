<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class AddStock extends Model
{
 protected $guarded = [];

    public function product(){

        return $this->belongsTo(Product::class, 'product_id');
    }
}
