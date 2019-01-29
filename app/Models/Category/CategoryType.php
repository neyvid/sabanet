<?php


namespace App\Models\Category;


class CategoryType
{
    const PRODUCT = 1;
    const NEWS = 2;
    const ARTICLE = 3;

    public static function getCategoryType()
    {
        return [
            self::PRODUCT => 'محصولات',
            self::NEWS => 'اخبار',
            self::ARTICLE => 'مقالات'
        ];
    }

    public static function getCategoryTypeWithNumber(int $categoryTypeNumber)
    {
        return self::getCategoryType()[$categoryTypeNumber];
    }

}
