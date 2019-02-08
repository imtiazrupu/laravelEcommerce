<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\ProductReview;
use App\ProductSize;
use Cart;
use App\Category;
use DB;
use App\SubCategory;
// use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{

    public function product($id)
    {
        $min = 0;
        $max = 1000000;

        $reviewList = ProductReview::get();
        $rating = collect($reviewList)
            ->map(function ($review) {return $review->rating; })
            ->average();

            $reviewList = collect($reviewList)->reject(function ($review) {
                return empty($review->review);
            });

        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')->get();
        $x = Category::select(['id', 'name'])
        ->get();
        $subCat = SubCategory::select(['id', 'name'])
                ->get();
        $products = Product::where('product_category_id', $id)
            ->whereBetween('price', [$min, $max])->paginate(24);
        // return $products;
        // $products = Product::all();
        return view('shop.pages.product.product_grid')
        ->with('reviewList', $reviewList)
        ->with('rating', $rating)
        ->with('x', $x)
        ->with('subCat', $subCat)
        ->with('productBestsell', $productBestsell)
        ->with(['products' => $products]);
    }
    public static function category_count($category_id) {
        return DB::table('products')
        ->select(DB::raw('count(*) as num'))
        ->where('category_id', $category_id)
        ->count();
    }
    public static function subCategory_count($sub_category_id) {
        return DB::table('products')
        ->select(DB::raw('count(*) as num'))
        ->where('sub_category_id', $sub_category_id)
        ->count();
    }
    public static function productCategory_count($product_category_id) {
        return DB::table('products')
        ->select(DB::raw('count(*) as num'))
        ->where('product_category_id', $product_category_id)
        ->count();
    }
    public function allProduct(){
        $products = Product::select(['id','name', 'description','default_img','price'])
        ->orderBy('id','desc')
        ->get();
        return view('shop.pages.product.product_grid')
        ->with('products',$products);

    }
    public function shoppingBag () {
        $cartItems = \Cart::getContent();
        return view('shop.pages.product.shoppingBag', compact('cartItems'));
    }
    public function buyNow (Request $request) {
        $qty = $request->qty;
        $size = $request->sizes;
        $product = \DB::table('products')
            ->where('id', '=', $request->id)
            ->first();

            Cart::add(
                array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => (int) $qty,
                    'attributes' => array(
                        'size' => $size,
                        'default_img' => $product->default_img
                    )
                )
            );
        return \redirect('shop/checkout');
    }
}
