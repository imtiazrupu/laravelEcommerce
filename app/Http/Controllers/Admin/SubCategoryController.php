<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Http\Traits\SaveImageTrait;
use App\Category;
use App\SubCategory;
use Session;

class SubCategoryController extends Controller
{
    use SaveImageTrait;
      public function store(CreateSubCategoryRequest $request)
    {
        $imgName = $this->saveImage($request);

        SubCategory::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'img' => $imgName
        ]);

        Session::flash('success', 'Successfully created subcategory');
        return redirect()->back();
    }
    public function subCategory()
    {
         $categories = Category::all(['id', 'name', 'img']);
        $subCategories = SubCategory::all();
        return view('dashboard.pages.subCategory.sub-categories')
            ->with('subCategories', $subCategories)
            ->with('categories', $categories);
    }
    public function editPage($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('dashboard.pages.subCategory.edit-sub-categories')
            ->with('subCategory', $subCategory)
            ->with('categories', $categories);
    }
    public function edit($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->name = request('name');
        $subCategory->description = request('description');
        $subCategory->category_id = request('category_id');


        if (request()->has('img')) {
            \Storage::delete($subCategory->img);
            $subCategory->img = request()->file('img')->store('img');
        }
        $subCategory->save();

        \Session::flash('success', 'successfully subcategory is updated');
        return redirect('dashboard/sub-categories');
    }
    public function delete($id)
    {
        SubCategory::destroy($id);
        \Session::flash('success', 'SubCategory is successfully deleted');
        return redirect('dashboard/sub-categories');
    }
}
