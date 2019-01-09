<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateCreate extends FormRequest
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
            'name'=>'required|regex:/^[اآبپتثئجچحخدذرزژسشصضطظعغفقکگلمنوهی\s]+$/'
        ];
    }public function messages()
    {
        return [
            'name.required'=>'نام استان را الزامی می باشد',
            'name.regex'=>'نام استان را بصورت فارسی و صحیح وارد نمایید'
        ];
    }
}
