<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule; 

use Illuminate\Foundation\Http\FormRequest;

class StoreMenu_DishRequest extends FormRequest
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
            'ingredient_id' => 'required|unique_with:dish_ingredient,dish_id',
            'quantity' => 'required|integer|min:0',
             ];
        
    }
    public function messages(){
        return [
            'ingredient_id.required' => 'Vui long chon thuc pham',
            'ingredient_id.unique_with' => 'Thuc pham da ton tai',
            'quantity.required' => 'Vui long nhap so luong',
            'quantity.integer' => 'So luong lon hon 0',
            'quantity.min' => 'So luong lon hon 0',
        ];
    }
}
