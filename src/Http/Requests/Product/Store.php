<?php

namespace Level7up\ECommerce\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'price'=>'required|numeric',
            'qty'=>'required|numeric',
            'category_id'=>'required|exists:categories,id',
            'special'=> 'sometimes',
            'image'=>'sometimes'
        ];
    }
}