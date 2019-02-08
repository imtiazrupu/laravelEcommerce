<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRegisterRequest;
use App\BillingAddress;
use App\User;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    public function loginPage2(){

        return view('shop.pages.registration.registration3');
    }
    public function loginPage(){

        return view('shop.pages.registration.registration');
    }
    public function loginPageCheck(){

        return view('shop.pages.registration.registration_check');
    }
    public function register(CustomerRegisterRequest $request)
    {
        // prepare data
        $userData = $request->all(['first_name', 'last_name', 'phone', 'email']);
        $billingData = $request->all(['state', 'city', 'address']);

        // save customer
        $userData['type'] = User::CUSTOMER;
        $userData['password'] = bcrypt($request->password);
        $user = User::create($userData);

        // save billing address
        $billingAddress = new BillingAddress($billingData);
        $user->billingAddress()->save($billingAddress);

        Session::flash('success',
            'Successfully registered.');
        return redirect('customer-login');
    }
    public function registerCheck(CustomerRegisterRequest $request)
    {
        // prepare data
        $userData = $request->all(['first_name', 'last_name', 'phone', 'email']);
        $billingData = $request->all(['state', 'city', 'address']);

        // save customer
        $userData['type'] = User::CUSTOMER;
        $userData['password'] = bcrypt($request->password);
        $user = User::create($userData);

        // save billing address
        $billingAddress = new BillingAddress($billingData);
        $user->billingAddress()->save($billingAddress);

        Session::flash('success',
            'Successfully registered.');
        return redirect('customer-login-check');
    }
    public function login()
    {
        $credentials = \request(['email', 'password']);
        $credentials['type'] = User::CUSTOMER;

        if (auth()->attempt($credentials)) {
            session([
                'name' => \request('email')
            ]);
            return redirect('');
        } else {
            Session::flash('message',
                "Invalid Credentials , Please try again with correct credentials.");
            return redirect('customer-login');
        }
    }
    public function loginCheck()
    {
        $credentials = \request(['email', 'password']);
        $credentials['type'] = User::CUSTOMER;

        if (auth()->attempt($credentials)) {
            session([
                'name' => \request('email')
            ]);
            return redirect('shop/checkout');
        } else {
            Session::flash('message',
                "Invalid Credentials , Please try again with correct credentials.");
            return redirect('customer-login-check');
        }
    }
    public function logout()
    {
        Session::flush();
        auth()->logout();
        return redirect('/');
    }
}
