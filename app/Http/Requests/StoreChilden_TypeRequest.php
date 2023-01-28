<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChilden_TypeRequest extends FormRequest
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
            'name'=>'bail|required|unique:children_type',
            'description' =>'bail|required',
            'kalo_day' => 'bail|required|integer|min:0',
            'protein' => 'bail|required|integer|min:0',
            'lipid' => 'bail|required|integer|min:0',
            'carb' => 'bail|required|integer|min:0',
            'cost' => 'bail|required|integer|min:0',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên nhóm trẻ',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Vui lòng nhập mô tả',
            'kalo_day.required' => 'Vui lòng nhập số lượng kalo',
            'kalo_day.integer' => 'Kalo không hợp lệ',
            'kalo_day.min' => 'Kalo không hợp lệ',
            'protein.required' => 'Vui lòng nhập số lượng đạm',
            'protein.integer' => 'Số lượng đạm không hợp lệ',
            'protein.min' => 'Số lượng đạm không hợp lệ',
            'lipid.required' => 'Vui lòng nhập số lượng chất béo',
            'lipid.integer' => 'Số lượng chất béo không hợp lệ',
            'lipid.min' => 'Số lượng chất béo không hợp lệ',
            'carb.required' => 'Vui lòng nhập số lượng tinh bột',
            'carb.integer' => 'Số lượng tinh bột không hợp lệ',
            'carb.min' => 'Số lượng tinh bột không hợp lệ',
            'cost.required' => 'Vui lòng nhập giá tiền',
            'cost.integer' => 'Giá tiền không hợp lệ',
            'cost.min' => 'Giá tiền không hợp lệ',
        ];
    }
}
