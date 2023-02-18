<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'ingredient_id' => 'required|unique:dish_ingredient,ingredient_id,NULL,dish_id'.$this->id_dish,
            'quantity' => 'required',
             ];
        
    }
    public function messages(){
        return [
            'ingredient_id.required' => 'Vui long chon thuc pham',
            'ingredient_id.unique' => 'Thuc pham da ton tai',
            'quantity.required' => 'Vui long nhap so luong',
            'quantity.integer' => 'So luong lon hon 0',
        ];
    }
}
