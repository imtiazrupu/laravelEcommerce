<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Model\AddStocK;
use DB;

class AddStockController extends Controller
{
    public function report(){
        $product_id = Product::all();
        $stockIns = AddStocK::select(['id','product_id','total'])
        ->orderBy('product_id','desc')->get();

        // $id = 4;

        // $last_total = AddStocK::where('product_id', '=', $id)->orderBy('total', 'desc')->first()->total;

        return view('dashboard.pages.inventory.report')
        ->with('stockIns', $stockIns)
        ->with('product_id', $product_id);
    }
    public function addStock(){
        $product_id = Product::all();
        $stockIns = AddStocK::select(['id','product_id','add_qty','total'])
        ->whereNotNull('add_qty')
        ->orderBy('updated_at','desc')->get();

        // $id = 4;

        // $last_total = AddStocK::where('product_id', '=', $id)->orderBy('total', 'desc')->first()->total;

        return view('dashboard.pages.inventory.add_stock')
        ->with('stockIns', $stockIns)
        ->with('product_id', $product_id);
    }
    public function create(Request $request)
    {
        $data = $request->all(['product_id', 'add_qty','total','remarks']);


        $stock = new AddStocK($data);
        $stock->save();

        \Session::flash('success', 'stock In is successfully created');
        return redirect()->back();
    }

    public function outStock(){
        $product_id = Product::all();
        $stockIns = AddStocK::select(['id','product_id','withdraw','total'])
        ->whereNotNull('withdraw')
        ->orderBy('updated_at','desc')->get();

        return view('dashboard.pages.inventory.out_stock')
        ->with('stockIns', $stockIns)
        ->with('product_id', $product_id);
    }
    public function out(Request $request)
    {
        $data = $request->all(['product_id', 'withdraw','total','remarks']);


        $stock = new AddStocK($data);
        $stock->save();

        \Session::flash('success', 'stock Out is successfully created');
        return redirect()->back();
    }



}
