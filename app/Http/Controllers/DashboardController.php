<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAdminRequest;
use App\User;
use App\Category;
use App\SubCategory;
use App\ProductCategory;


class DashboardController extends Controller
{

    public function category()
    {
        $categories = Category::select(['id','name','description','img'])

        ->orderBy('id','desc')
        ->get();
        return view('dashboard.pages.category.categories', compact('categories'));
    }


    public function createAdminPage()
    {

        return view('dashboard.pages.create-admin');
    }
    public function createAdmin(CreateAdminRequest $request)
    {
        $data = $request->all([
            'first_name',
            'last_name',
            'phone',
            'email',

        ]);
        $data['password'] = bcrypt($request->password);
        $data['type'] = User::ADMIN;
        User::create($data);
        \Session::flash('success', 'Successfully admin is created');
        return redirect()->back();
    }

}
