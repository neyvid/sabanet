<?php

namespace App\Http\Requests;

use App\Rules\checkCodeMeliRule;
use Illuminate\Foundation\Http\FormRequest;

class userEditInfo extends FormRequest
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
            'name' => 'required|regex:/^[آب پ ت ث ج چ ح خ دذرزژس ش ص ض ط ظ ع غ ف ق ک گ ل م ن وه ی ا]+$/',
            'lastname' => 'required|regex:/^[آب پ ت ث ج چ ح خ دذرزژس ش ص ض ط ظ ع غ ف ق ک گ ل م ن وه ی ا]+$/',
            'mobile' => ['required', 'regex:/^09(0[1-5]|1[0-9]|2[0-2]|3[0-9]|9[4|8|9])-?[0-9]{3}-?[0-9]{4}$/'],
            'codemeli' => ['required', new checkCodeMeliRule],
            'email' => 'required|email',
            'address' => 'required',
            'companyName' => 'required_with:isCompany,on',
            'economyCode' => 'required_with:isCompany,on',
            'nationalCode' => 'required_with:isCompany,on',
            'registerNumber' => 'required_with:isCompany,on',
            'connectorName' => 'required_with:isCompany,on',
            'connectorLastname' => 'required_with:isCompany,on',
            'connectorMobile' => 'required_with:isCompany,on',['regex:/^09(0[1-5]|1[0-9]|2[0-2]|3[0-9]|9[4|8|9])-?[0-9]{3}-?[0-9]{4}$/'],
            'connectorCodeMeli' => 'required_with:isCompany,on',[new checkCodeMeliRule],
            'connectorEmail' => 'required_with:isCompany,on',['email'],
            'companyAddress' => 'required_with:isCompany,on',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام خود را وارد نمایید',
            'name.regex' => 'نام خود را بصورت فارسی وارد نمایید',
            'lastname.regex' => 'نام خانوادگی خود را بصورت فارسی وارد نمایید',
            'lastname.required' => 'نام خانوادگی خود را وارد نمایید',
            'mobile.required' => 'شماره همراه خود را وارد نمایید',
            'mobile.regex' => 'شماره همراه خود را بصورت صحیح و 11 رقمی وارد نمایید',
            'email.regex' => 'ایمیل وارد شده معتبرنمی باشد',
            'email.required' => 'ایمیل خود را وارد نمایید',
            'codemeli.required' => 'کدملی خود راوارد نمایید',
            'address.required' => 'آدرس پستی خودر اوارد نمایید',
            'companyName.required_with' => 'نام شرکت را وارد نمایید',
            'economyCode.required_with' => 'کد اقتصادی شرکت را وارد نمایید',
            'nationalCode.required_with' => 'کد ملی شرکت را وارد نمایید',
            'registerNumber.required_with' => 'شماره ثبت شرکت را وارد نمایید',
            'connectorName.required_with' => 'نام رابط شرکت را وارد نمایید',
            'connectorLastname.required_with' => 'نام خانوادگی رابط شرکت را وارد نمایید',
            'connectorMobile.required_with' => 'شماره همراه رابط شرکت را وارد نمایید',
            'connectorCodeMeli.required_with' => 'کد ملی رابط شرکت را وارد نمایید',
            'connectorEmail.required_with' => 'ایمیل رابط شرکت را وارد نمایید',
            'companyAddress.required_with' => 'آدرس کامل شرکت را وارد نمایید',

        ];
    }
}
