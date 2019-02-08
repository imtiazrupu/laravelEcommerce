<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at', 'product_id'];
}
