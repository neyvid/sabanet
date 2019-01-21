<?php


namespace App\Models\Service;


class ServiceType
{
    const NORMAL=1;
    const SPECIAL=2;
    const FESTIVAL=3;
    const VIP=4;

    public static function getServiceType()
    {
        return [
            self::NORMAL=>'عادی',
            self::SPECIAL=>'ویژه',
            self::FESTIVAL=>'جشنواره',
            self::VIP=>'VIP',

        ];
    }

    public static function getServiceTypeWithTypeNumber(int $numberOfType)
    {
        return self::getServiceType()[$numberOfType];

    }
}
