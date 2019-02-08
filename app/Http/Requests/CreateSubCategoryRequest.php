<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubCategoryRequest extends FormRequest
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
            'category_id.required' => 'You must select a category',
            'name.required' => 'Category name is required',
            'description.required' => 'Description is required',
            'input_img.required' => 'Input image is required',
            'input_img.mimes' => 'Input image must be of types jpeg, bmp or png'
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
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'input_img' => 'required|mimes:jpeg,jpg,bmp,png'
        ];
    }
}
