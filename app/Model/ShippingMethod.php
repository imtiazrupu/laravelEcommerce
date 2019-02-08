<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'type',
    ];
}
