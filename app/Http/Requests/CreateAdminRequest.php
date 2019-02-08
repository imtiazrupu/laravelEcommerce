<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
        return array(
            'first_name.max' => 'Your first-name exceeds 30 chars',
            'last_name.max' => 'Your last-name exceeds 30 chars',
            'email' => 'Email must be of valid email type',
            'password.min' => 'Minimum password length is 6 characters'
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }
}
