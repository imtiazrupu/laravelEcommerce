<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class, 'sub_category_id');
    }
}
