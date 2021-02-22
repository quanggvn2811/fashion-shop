<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        'name'=>['required', 'unique:tbl_fs_productlines,name,'.$this->segment(3).',prodline_id', 'string', 'max:255'],
        'desc'=>['max:255'],
    ];
}
public function messages(){
    return [
        'name.unique'=>'Category name are duplicated',
    ];
}
}
