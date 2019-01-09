<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePassword extends FormRequest
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
            'password' => 'required|confirmed|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'

        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'کلمه عبورخودراواردنمایید',
            'password.regex' => 'رمز عبور حداقل باید ۸ کاراکتر باشد وترکیبی ازحروف کوچک وبزرگ واعداد باشد',
            'password.confirmed' => 'رمزعبور با تکرار رمز عبور همخوانی ندارد',

        ];
    }
}
