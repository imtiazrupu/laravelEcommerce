<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'sub_category_id.required' => 'You must select a sub-category',
            'product_category_id.required' => 'You must select a product category',
            'name.required' => 'Product name is required',
            'price.required' => 'Product price is required',
            'description.required' => 'Product description is required',
            'item_no.required' => 'Item no is required',
            'versions.required' => 'Version is required',
            'default_img.required' => 'Default image is required',
            'default_img.mimes' => 'Image must be type of jpeg, png or bmp',
            'color.required' => 'color is required',
             'pdf.mimes' => 'File must be pdf',
             'featured.required' => 'featured  is required',
             'pdf.required' => 'Pdf file is required'


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
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'product_category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'item_no' => 'required',
            'versions' => 'required',
            'default_img' => 'required|mimes:jpeg,jpg,png,bmp',
            'color' => 'required',
            'featured'=> 'required',
            'pdf' => 'required|mimes:pdf'

        ];
    }
}
