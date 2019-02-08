<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\SaveImageTrait;
use App\ProductCategory;
use App\SubCategory;
use App\Category;

class ProductCategoryController extends Controller
{
    use SaveImageTrait;
    public function store(Request $request)
    {
        $data = $request->all(array(
            'sub_category_id',
            'name',
            'description'

        ));
        $data['img'] = $this->saveImage($request);

        $productCategory = new ProductCategory($data);
        $saved = $productCategory->save();
        if (!$saved) {
            return redirect()->back()->with(array(
                'message' => 'Could not save'
            ));
        }
        \Session::flash('success', 'Successfully created product category');
        return redirect()->back();
    }
    public function productCategory()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $productCategories = ProductCategory::all();

        return view('dashboard.pages.productCategories.product-categories')
        ->with('productCategories', $productCategories)
        ->with('subCategories', $subCategories)
            ->with('categories', $categories);
    }
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        $subCategory = SubCategory::all();
        $categories = Category::all();
        return view('dashboard.pages.productCategories.edit-product-categories')
        ->with('productCategory', $productCategory)
        ->with('subCategory', $subCategory)
            ->with('categories', $categories);
    }
    public function editStore($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->name = request('name');
        $productCategory->description = request('description');

        $productCategory->sub_category_id = request('sub_category_id');


        if (request()->has('img')) {
            \Storage::delete($productCategory->img);
            $productCategory->img = request()->file('img')->store('img');
        }
        $productCategory->save();

        \Session::flash('success', 'successfully Productcategory is updated');
        return redirect('dashboard/product-categories');
    }
    public function delete($id)
    {
        ProductCategory::destroy($id);
        \Session::flash('success', 'ProductCategory is successfully deleted');
        return redirect('dashboard/product-categories');
    }
}
