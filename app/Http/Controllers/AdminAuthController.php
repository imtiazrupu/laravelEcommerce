<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class AdminAuthController extends Controller
{
    public function loginPage()
    {
        if (auth()->check()) {
            return redirect('admin-dashboard');
        }
        return view('dashboard.auth.login');
    }
    public function logout()
    {
        \Session::flush();
        auth()->logout();
        return redirect('admin-login');
    }
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $request->validate($rules);

        $credentials = request(['email', 'password']);

        $user = User::where('email', '=', \request('email'))->first();
        $credentials['type'] = $user['type'];


        if (auth()->attempt($credentials)) {
            session(['name' => request('email'), 'type' => $user['type']]);
            return redirect('admin-dashboard');
        } else {
            \Session::flash('message', "Invalid Credentials , Please try again.");
            return redirect('admin-login');
        }
    }
}
