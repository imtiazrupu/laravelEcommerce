<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\SubCategory;
use App\ProductCategory;

class BestSellerController extends Controller
{
    public function bestProductCategory()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $productCategories = ProductCategory::all();

        return view('dashboard.pages.product-categories')
        ->with('productCategories', $productCategories)
        ->with('subCategories', $subCategories)
            ->with('categories', $categories);
    }
}
