<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'bail|required|unique:meals,name,'.$this->user()->id,
            'description' =>'bail|required',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên bữa ăn',
            'name.unique' => 'Tên đã tồn tại',
            'description.required' => 'Vui lòng nhập mô tả',
        ];
    }
}
