<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
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
            'name'=>['required', 'string', 'max:255', 'unique:tbl_fs_brands,name', 'regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/'],
            'description'=>['max:255'],
        ];
    }
    public function messages(){
        return [
            'name.unique'=>'Brand name are duplicated',
        ];
    }
}
