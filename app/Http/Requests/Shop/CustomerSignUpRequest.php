<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class CustomerSignUpRequest extends FormRequest
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
            'username'=>['required', 'unique:tbl_fs_customers,username', 'string', 'min:6', 'max:100'],
            'email'=>['required', 'unique:tbl_fs_customers,email', 'email', 'string', 'min:10', 'max:200'],
            'password'=>['required', 'min:6'],
        ];
    }
}
