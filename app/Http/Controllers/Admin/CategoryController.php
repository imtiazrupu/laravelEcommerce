<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use Session;
use App\Responses\CreateCategoryResponse;
use App\Http\Traits\SaveImageTrait;
use App\Category;
class CategoryController extends Controller
{
    use SaveImageTrait;
    public function __construct()
    {
        $this->middleware('admin');
    }
    public static function category()
    {
        $categories = Category::with(['subCategory' => function ($query) {
            $query->with('productCategories');
        }])->get();

        return $categories;
    }
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->all(['name', 'description']);
        $data['img'] = $this->saveImage($request);

        $category = new Category($data);
        $category->save();

        \Session::flash('success', 'Category is successfully created');
        return redirect()->back();
    }
    public function edit($id)
    {
        $category = \DB::table('categories')
            ->where('id', '=', $id)
            ->first();
        return view('dashboard.pages.category.edit-categories', compact('category'));
    }

    public function editStore($id)
    {
        $category = Category::findOrFail($id);
        $category->name = request('name');
        $category->description = request('description');

        if (request()->has('img')) {
            \Storage::delete($category->img);
            $category->img = request()->file('img')->store('img');
        }
        $category->save();

        \Session::flash('success', 'Category is successfully updated');
        return redirect('dashboard/categories');
    }
    public function delete($id)
    {
        Category::destroy($id);
        \Session::flash('success', 'Category is successfully deleted');
        return redirect('dashboard/categories');
    }

}
