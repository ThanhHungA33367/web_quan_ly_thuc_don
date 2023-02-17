<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name'=>'bail|required|unique:dishes,name,'. $this->id,
            'description' =>'bail|required',
            'dish_type_id' =>'bail|required',
            'children_type_id' =>'bail|required',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên món ăn',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Vui lòng nhập mô tả',
            'dish_type_id.required'=> 'Vui lòng chọn nhóm món ăn',
            'children_type_id.required'=> 'Vui lòng chọn nhóm trẻ',
        ];
    }
}
