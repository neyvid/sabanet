<?php

namespace App\Rules;

use App\Services\CodeMeliCheck\CodeMeliCheck;
use Illuminate\Contracts\Validation\Rule;

class checkCodeMeliRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute,$value)
    {
        return CodeMeliCheck::isTrueCodeMeli($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'کد ملی وارد شده معتبر نمی باشد';
    }
}
