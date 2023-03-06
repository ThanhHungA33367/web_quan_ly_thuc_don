<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
            'school_name'=>'bail|required',
            'phone'=>'bail|required|regex:/(0)[0-9]{9}/',
            'full_name'=>'bail|required|min:5',
            'email'=>'bail|required|email|unique:users,email,'. $this->id,
        ];
    }
    public function messages(){
        return [
            'school_name.required'=>'Vui lòng nhập tên trường',
            'full_name.required'=>'Vui lòng nhập tên',
            'full_name.min'=>'Tên phải tối thiểu 5 kí tự',
            'phone.required'=>'Vui lòng nhập SĐT',
            'phone.regex'=>'Sai SĐT',
            'email.unique'=>'Đã tồn tại email',
            'email.required'=>'Vui lòng nhập email',
        ];
    }
}
