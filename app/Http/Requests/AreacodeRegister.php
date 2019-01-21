<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreacodeRegister extends FormRequest
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
            'areacode' => 'required|regex:/^[1-9][0-9]{3}/',
            'oprators' => 'required',
            'state' => 'required',
            'city' => 'required',
            'code' => 'required|regex:/^[0][1-9]{2}/',
            'telecomcenter' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'areacode.required' => 'پیش شماره را وارد نمایید',
            'areacode.regex' => 'پیش شماره را بصورت صحیح وارد نمایید.(۴ رقم باشد و با صفر شروع نشود)',
            'oprators.required' => 'حداقل یک اپراتور را انتخاب نمایید',
            'code.required' => 'کد استان راوارد نمایید',
            'code.regex' => 'کد استان را بصورت سه رقمی و صحیح وارد نمایید',
            'state.required' => 'استان مورد نظر را انتخاب نمایید',
            'city.required' => 'شهر مورد نظر را انتخاب نمایید',
            'telecomcenter.required' => 'مرکز مخابرات مورد نظر را انتخاب نمایید',
        ];
    }
}
