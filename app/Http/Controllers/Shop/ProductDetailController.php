<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\SubCategory;
use App\ProductCategory;
use App\ProductImage;
use App\ProductReview;
use App\ProductSize;
use DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Input;

class ProductDetailController extends Controller
{
    public function detail($id)
    {
        $x = Category::select(['id', 'name'])
        ->get();
        $subCat = SubCategory::select(['id', 'name'])
                ->get();
        $product = Product::findOrFail($id);
        $productCategory = ProductCategory::all();
        $subCategory = SubCategory::all();
        $categories = Category::all();

        $reviewList = ProductReview::where('product_id', $id)
        ->get();
        $rating = collect($reviewList)
            ->map(function ($review) {return $review->rating; })
            ->average();

            $reviewList = collect($reviewList)->reject(function ($review) {
                return empty($review->review);
            });

        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')->get();


        // $min = 0;
        // $max = 1000000;
        // $products = Product::where('product_category_id', $id)
        //     ->whereBetween('price', [$min, $max])->paginate(24);
        // // return $products;
        // $products = Product::all();
         return view('shop.pages.product.product_detail')
         ->with('rating', $rating)
         ->with('x', $x)
         ->with('subCat', $subCat)
         ->with(['productBestsell'=> $productBestsell])
         ->with('product', $product)
         ->with('productCategory', $productCategory)
         ->with('subCategory', $subCategory)
         ->with('categories', $categories)
         ->with('reviewList', $reviewList);
        // ->with(['products' => $products]);
    }
    public static function category_count($category_id) {
        return DB::table('products')
        ->select(DB::raw('count(*) as num'))
        ->where('category_id', $category_id)
        ->count();
    }
    public function details(){
        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')->get();

        $product = Input::get('product');
        if($product != null) {
            $products =  Product::where('name', 'LIKE', '%'.$product.'%')
                ->orWhere('price', 'LIKE', '%'.$product.'%')
                ->orWhere('description', 'LIKE', '%'.$product.'%')
                ->orWhere('default_img', 'LIKE', '%'.$product.'%')->get();
        } else {
            $products = Product::all();
        }
        return view('shop.pages.product.search_products')
            ->with('products',$products)
            ->with(['productBestsell'=> $productBestsell]);

    }




}
