<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
use App\Http\Requests\UniqueDishMealPairRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'children_type_id' => 'required|numeric',
            'menu_date' => 'required|date',
            'mealdish.meal_id' => ['nullable', 'numeric', new UniqueDishMealPairRule], //use custom rule
            'dish_id1' => 'required',
            'dish_id2' => 'required',

        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên thực đơn',
            'description.required' => 'Vui lòng nhập mô tả',
            'menu_date.required' => 'Vui lòng nhập ngày',
            'children_type_id.required' => 'Vui lòng chọn nhóm trẻ',
            'dish_id1.required' => 'Vui lòng chọn món',
            'dish_id2.required' => 'Vui lòng chọn món',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Một số trường không hợp lệ',
            'errors' => $validator->errors(),
        ], 422));
    }

}
