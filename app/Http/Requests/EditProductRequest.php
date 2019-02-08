<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name.required'         => 'Product name is required',
            'price.required'        => 'Product price is required',
            'price.numeric'         => 'Price must be numeric value',
            'description.required'  => 'Product description is required',
            'versions.required'     => 'Version is required',
            // 'material.required'     => 'Material is required',
            'color.required'        => 'Color is required',
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
            'name'          => 'required',
            'price'         => 'required|numeric',
            'description'   => 'required',
            'versions'      => 'required',
            // 'material'      => 'required',
            'color'         => 'required'
        ];
    }
}
