<?php

namespace App\Services\JalaliDate;


use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;


class JalaliDate
{
    public static function get_date_in_jalali_without_time(Carbon $carbon)
    {
        return Verta::instance($carbon)->format('j %B %Y');
    }


}


