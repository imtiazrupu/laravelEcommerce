<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class, 'sub_category_id');
    }
}
