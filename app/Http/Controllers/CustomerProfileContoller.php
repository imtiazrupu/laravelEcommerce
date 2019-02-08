<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRegisterRequest;
use App\BillingAddress;
use App\User;
use App\Product;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerProfileContoller extends Controller
{
public function profile(){
    $user = request()->user();
    $userDetail = BillingAddress::where('user_id', '=', $user->id)->first();
    $productBestsell = Product::where('featured', '=', 0)
    ->orderBy('id','desc')->get();

    return view('shop.pages.profile.profile')
    ->with(['productBestsell'=> $productBestsell])
    ->with(['user' => $user, 'userDetail' => $userDetail]);
}
public function editProfile()
{
    $user = request()->user();
    $userDetail = BillingAddress::where('user_id', '=', $user->id)->first();
    $productBestsell = Product::where('featured', '=', 0)
    ->orderBy('id','desc')->get();
    return view('shop.pages.profile.edit_profile')
    ->with([
        'productBestsell'=> $productBestsell,
        'user' => $user, 'userDetail' => $userDetail]);

}
public function updateProfile(Request $request)
{
    $userId = Auth::id();
    $userDetailsData = $request->all(
        [ 'state', 'city',
            'address'
        ]);

    DB::table('billing_address')
        ->where('user_id', $userId)
        ->update($userDetailsData);
    DB::table('users')
        ->where('id', $userId)
        ->update($request->all([
            'first_name','last_name']));
    return \redirect('customer-profile');
}
}
