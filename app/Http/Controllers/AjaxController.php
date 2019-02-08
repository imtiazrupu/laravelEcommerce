<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Shop\CategoryController;
use App\Product;
use App\ProductCategory;
use App\SubCategory;
use Illuminate\Support\Facades\Input;
use Cart;
use function PHPSTORM_META\map;
use App\Category;
use App\Model\AddStocK;

class AjaxController extends Controller
{
    public function subCat(Request $request)
    {
        if ($request->ajax()) {
            $cat_id = $request->input('cat_id');
            $subCategories = SubCategory::where('category_id', '=', $cat_id)->get();
            return response()->json($subCategories);
        }

        return response()->json(['message' => 'Only ajax request is accepted']);
    }
    public function productCat(Request $request)
    {
        // if (! \request()->ajax()) {
        //     return response()->json(['message' => 'Only ajax request is accepted']);
        // }
        $sub_cat_id = $request->input('sub_id');
        $subCategories = ProductCategory::where('sub_category_id', '=', $sub_cat_id)->get();
        return response()->json($subCategories);
        if ($request->ajax()) {
            $sub_cat_id = $request->input('sub_id');
            $subCategories = ProductCategory::where('sub_category_id', '=', $sub_cat_id)->get();
            return response()->json($subCategories);
        }
    }
    public function addToCart(Request $request)
    {
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
            return \redirect('shopping-bag');
    }
    public function ajaxAddToCart(Request $request)
    {
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
        $total = Cart::getTotal();
        $totalQty = Cart::getTotalQuantity();
        $cartItems = Cart::getContent();

        return response()->json([
            'total' => $total,
            'totalQty' => $totalQty,
            'cartItems' => $cartItems
        ]);
    }
    public function removeFromCart($product_id){
        Cart::remove($product_id);
        return \redirect()->back();;
    }
    public function cartResponse () {
        $total = Cart::getTotal();
        $totalQty = Cart::getTotalQuantity();
        $cartItems = Cart::getContent();

        return response()->json([
            'total' => $total,
            'totalQty' => $totalQty,
            'cartItems' => $cartItems
        ]);
    }

    public function getInventoryTotal($product_id) {
        $last_total = AddStocK::where('product_id', '=', $product_id)->orderBy('updated_at', 'desc')->first();
        $total = 0;
        if(isset($last_total->total)){
            $total = $last_total->total;
        }
        return response()->json([
            'total' => $total
        ]);
    }
}
