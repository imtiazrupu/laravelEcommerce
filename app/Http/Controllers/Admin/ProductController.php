<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Category;
use App\SubCategory;
use App\ProductCategory;
use App\Product;
use App\ProductImage;
use App\ProductSize;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.pages.products.create-products', compact('categories'));
    }
    public function test(){
        return view('dashboard.pages.products.create-products');
    }
    public function create(CreateProductRequest $request)
    {
        $defaultImgName = '';
        if ($request->has('default_img')) {
            $defaultImgName = $request->file('default_img')
                ->store('img');
        }

        $pdfName = '';
        if ($request->has('pdf')) {
            $pdfName = $request->file('pdf')
                ->store('pdf');
        }

        $data = [
            'category_id' => request('category_id'),
            'sub_category_id' => request('sub_category_id'),
            'product_category_id' => request('product_category_id'),
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'item_no' => request('item_no'),
            'versions' => request('versions'),
            'featured' => request('featured'),
            'color' => request('color'),
            'collection' => request('collection'),
            'brand' => request('brand'),
            'product_code' => request('product_code'),
            'pdf' => $pdfName,
            'default_img' => $defaultImgName
        ];

        $productId = Product::create($data)->id;

        if ($request->has('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $fileName = \Storage::putFile('img', $file);
                $productImg = new ProductImage();
                $productImg->img = $fileName;
                $productImg->product_id = $productId;
                $productImg->save();
            }
        }

        if (!empty($request->sizes)) {
            $sizes = $request->sizes;
            $this->saveSizes($sizes, $productId);
        }

        \Session::flash('success', 'Successfully Product Created');
        return redirect()->back();
    }
    private function saveSizes(array $sizes, $productId)
    {
        foreach ($sizes as $size) {
            if ($size !== null) {
                $productSize = new ProductSize();
                $productSize->size = $size;
                $productSize->product_id = $productId;
                $productSize->save();
            }
        }
    }
    public function products()
    {
        $products = Product::paginate(10);
        return view('dashboard.pages.products.products', ['products' => $products]);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $productCategory = ProductCategory::all();
        $subCategory = SubCategory::all();
        $categories = Category::all();
        return view('dashboard.pages.products.edit-product')
        ->with('product', $product)
        ->with('productCategory', $productCategory)
        ->with('subCategory', $subCategory)
        ->with('categories', $categories);
    }
    public function delete($id)
    {
        Product::destroy($id);
        \Session::flash('success', 'Product is successfully deleted');
        return redirect('dashboard/products');
    }
    public function editProduct( EditProductRequest $request,
        $productId
    )
    {
        $data = [
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'item_no' => request('item_no'),
            'versions' => request('versions'),
            'featured' => request('featured'),
            'collection' => request('collection'),
            'brand' => request('brand'),
            'product_code' => request('product_code'),
            'color' => request('color')
        ];
        if (!is_null(\request('default_img'))) {
            $product = Product::find($productId);
//            \Storage::delete($product->default_img);
            $data['default_img'] = $request->file('default_img')->store('img');
        }
        if (!is_null(\request('pdf'))) {
            $product = Product::find($productId);
//            \Storage::delete($product->default_img);
            $data['pdf'] = $request->file('pdf')->store('pdf');
        }
        \DB::table('products')
            ->where('id', $productId)
            ->update($data);
        if ($request->has('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $file) {
                $fileName = \Storage::putFile('img', $file);
                $productImg = new ProductImage();
                $productImg->img = $fileName;
                $productImg->product_id = $productId;
                $productImg->save();
            }
        }


//        $prevUrl = session()->get('url');
//        session()->forget('url');
        \Session::flash('success', 'Successfully updated product');
        return \Redirect::to('dashboard/products');
    }
}
