<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'phone.required' => 'phone is required',
            'phone.min:7' => 'The phone must be at least 7 characters.',
            'phone.same:users' => 'Phone number must be unique',
            'email.required' => 'Email is required',
            'email.same:users' => 'Email must be unique',
            'email.email' => 'Email must be valid email address',
            'state.required' => 'You must select a state',
            'city.required' => 'You must provide your billing city',
            'address.required' => 'You must provide with an address',
            'password.required' => 'Password is required',
            'password.min:6' => 'Minimum password must be of length ',
            'c_password.same:password' => 'Password need to match'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'first_name' => 'required',
            'last_name' => 'required',
//            'phone' => 'regex:/^(\+?6?01)[0-46-9]-*[0-9]{7,8}$/',
            'phone' => 'required|min:7|unique:users',
            'email' => 'required|email|unique:users',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
            'c_password' => 'same:password'
        ];
    }
}
