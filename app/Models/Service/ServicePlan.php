<?php


namespace App\Models\Service;


class ServicePlan
{
    const NEWYEAR = 1;
    const WINTER = 2;
    const FALL = 3;
    const SPRING = 4;
    const SUMMER = 5;

    public static function getServicePlan()
    {
        return [
            self::NEWYEAR => 'نوروزی',
            self::WINTER => 'زمستانه',
            self::FALL => 'پاییزه',
            self::SPRING => 'بهاره',
            self::SUMMER => 'تابستانه',
        ];
    }

    public static function getServicePlanWithPlanNumber(int $numberOfPlan)
    {
        self::getServicePlan()[$numberOfPlan];
    }

}
