<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class StoreMenuRequest extends FormRequest
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
            'name'=>'bail|required',
            'description' =>'bail|required',
            'children_type_id' => 'bail|required',
            'menu_date' => 'required',
            
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên thuc don',
            'description.required' => 'Vui lòng nhập mô tả',
            'menu_date.required' => 'Vui lòng nhập ngay',
            'children_type_id.required' => 'Vui lòng nhập chon nhom tre',
            
        ];
    }

    
}
