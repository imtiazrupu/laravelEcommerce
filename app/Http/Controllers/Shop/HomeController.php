<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductCategory;
use App\Product;
use App\ProductImage;
use App\slide;
use Session;
use App\Http\Traits\SaveImageTrait;
use App\NewCollection;
use App\ClassicCollection;
use App\OurStore;
use App\Blog;

class HomeController extends Controller
{
    public function index(){
        $slides = Slide::all();
        $productCategories = ProductCategory::all();
        $productBestsell = Product::where('featured', '=', 0)
        ->orderBy('id','desc')
//   ->take(2)
        ->get();
        $productspecial = Product::where('featured', '=', 2)
        ->orderBy('id','desc')
        ->get();
        $blogPosts = Blog::select(['id','name', 'description','img'])
        ->orderBy('id','desc')
        ->get();
        // return dd($productCategories);
        $newCollections = NewCollection::all();
        $classicCollections = ClassicCollection::all();
        $ourStore = OurStore::all();
        return view('template.template')
        ->with('blogPosts', $blogPosts)
        ->with('slides', $slides)
        ->with('ourStore', $ourStore)
        ->with('newCollections', $newCollections)
        ->with('classicCollections', $classicCollections)
        ->with('productBestsell', $productBestsell)
        ->with('productspecial', $productspecial);
    }
}

