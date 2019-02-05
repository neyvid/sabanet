<?php


namespace App\Models\Product;


class ProductType
{
    const NORMAL = 0;
    const NETWORK_EQUIPMENT = 1;
    const PC_EQUIPMENT = 2;

    public static function getProductTypes()
    {
        return [
            self::NORMAL => 'عادی',
            self::NETWORK_EQUIPMENT => 'تجهیزات شبکه برای سرویس اینترنت',
            self::PC_EQUIPMENT => 'تجهیزات کامپیوتربرای سرویس اینترنت',

        ];
    }

    public static function getProductTypeWithTypeNumber(int $type)
    {
        return self::getProductTypes()[$type];
    }
}
