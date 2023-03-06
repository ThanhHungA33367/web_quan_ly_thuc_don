<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class StoreDish_IngredientRequest extends FormRequest

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
            'ingredient_id' => 'required|unique:dish_ingredient,ingredient_id,' . $this->id . ',id,dish_id,' . $this->id_dish,
            'quantity' => 'required|integer|min:0',
             ];
        
    }
    public function messages(){
        return [
            'ingredient_id.required' => 'Vui lòng chọn thực phẩm',
            'ingredient_id.unique' => 'Thực phẩm đã tồn tại',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng lớn hơn 0',
            'quantity.min' => 'Số lượng lớn hơn 0',
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
