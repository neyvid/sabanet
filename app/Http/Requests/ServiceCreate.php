<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreate extends FormRequest
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
            'name'=>'required',
            'type'=>'required|regex:/^[0-4]{1}$/',
            'plan'=>'required|regex:/^[0-5]{1}$/',
            'period'=>'required|numeric',
            'nightTrafic'=>'required|regex:/^[0-1]{1}$/',
            'speed'=>'required|numeric',
            'limitAmount'=>'required|numeric',
            'internationalTrafic'=>'required|numeric',
            'price'=>'required|numeric',
            'discount'=>'numeric',
            'picture'=>'file|mimes:jpeg,gif,png',

        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'نام سرویس را وارد نمایید',
            'type.required'=>'نوع سرویس را انتخاب نمایید',
            'plan.required'=>'طرح سرویس را انتخاب نمایید',
            'period.required'=>'مدت زمان سرویس را وارد نمایید',
            'nightTrafic.required'=>'ترافیک شبانه سرویس را انتخاب نمایید',
            'speed.required'=>'سرعت سرویس را وارد نمایید',
            'limitAmount.required'=>'میزان حد آستانه سرویس را وارد نمایید',
            'internationalTrafic.required'=>'میزان ترافیک بین المللی سرویس را وارد نمایید',
            'price.required'=>'میزان ترافیک بین المللی سرویس را وارد نمایید',
            'picture.required'=>'بک تصویر برای این سرویس انتخاب نمایید',
            'picture.mimes'=>'فایل انتخاب شده می بایست تصویر باشد (فقط فایل های jpeg,jpg,png,gif قابل قبول می باشند)',
            'discount.numeric'=>'درصد تخفیف را به عدد وارد نمایید',
        ];
    }
}
