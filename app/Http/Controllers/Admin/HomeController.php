<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // return 'hello world';
        $best_sale =\DB::table('product_categories')
            ->select('id', 'name')
            ->get();

        return view('dashboard.pages.home', compact('best_sale'));
    }
    private function productCats()
    {


    }
}
