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
        'name'=>['required', 'unique:tbl_fs_productlines,name,'.$this->segment(3).',prodline_id', 'string', 'max:255', 'regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/'],
    ];
}
public function messages(){
    return [
        'name.regex'=>'Tên danh mục không hợp lệ',
        'name.unique'=>'Tên danh mục đã tồn tại',
    ];
}
}
