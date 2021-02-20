<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>['required', 'string', 'max:255'],
            'price'=>['required', 'numeric'],
            'quantity'=>['required', 'numeric'],
            'img.*'=>['image', 'mimes:jpg,png,svg,gif,jpeg', 'max:2048'],
        ];
    }
    public function messages(){
        return [
            'img.*.image'=>'Only images are accept',
            'img.*.mimes'=>'Only images are accept',
        ];
    }
}
