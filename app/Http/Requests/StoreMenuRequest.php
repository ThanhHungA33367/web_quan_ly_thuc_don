<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 
use App\Http\Requests\UniqueDishMealPairRule;

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
            'mealdish' => 'required|min:1',
            'mealdish.*.dish_id' => 'integer',
            'mealdish.*.meal_id' => ['nullable', 'numeric', new UniqueDishMealPairRule], //use custom rule
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên thuc don',
            'description.required' => 'Vui lòng nhập mô tả',
            'menu_date.required' => 'Vui lòng nhập ngay',
            'children_type_id.required' => 'Vui lòng nhập chon nhom tre',
            'mealdish.*.dish_id.integer' => 'The dish_id field is required for all mealdish items',
        ];
    }

    
}
