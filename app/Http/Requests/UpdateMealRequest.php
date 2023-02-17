<?php

namespace App\Http\Requests;
use App\Models\Meal;
use Illuminate\Validation\Rule;

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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //$id = Meal::where('name', $this->request->get('name'))->value('id');
        return [
            'name'=> 'required|unique:meals,name,'. $this->id,
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
