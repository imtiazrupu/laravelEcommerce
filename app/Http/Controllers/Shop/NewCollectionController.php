<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\ProductReview;
use App\ProductSize;
use DB;
use App\Category;
use App\SubCategory;

class NewCollectionController extends Controller
{
    public function product()
    {
        $reviewList = ProductReview::all();
        $rating = collect($reviewList)
            ->map(function ($review) {return $review->rating; })
            ->average();

            $reviewList = collect($reviewList)->reject(function ($review) {
                return empty($review->review);
            });

        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')->get();
        $products = Product::select(['id','name', 'price','default_img','description'])
         ->orderBy('id','desc')
         ->take(9)
         ->get();
        return view('shop.pages.product.product_grid')
        ->with('reviewList', $reviewList)
        ->with('rating', $rating)
        ->with(['productBestsell'=> $productBestsell])
        ->with(['products' => $products]);
    }
    public function classicProduct()

    {
        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')->get();
        $products = Product::where('featured', '=', 3)->get();
        return view('shop.pages.product.classic_product_grid')
        ->with(['productBestsell'=> $productBestsell])
        ->with('products', $products);
    }
}
