<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    protected $hidden = ['created_at', 'updated_at', 'product_id'];

    // public function productImage(){
    //     $this->belongsTo(Product::class, 'product_id');
    // }
}
