<?php


namespace App\Models\Article;


class ArticleStatus
{
    const ACTIVE = 1;
    const DEACTIVE = 0;

    public static function getArticleStatus()
    {
        return [self::ACTIVE => 'فعال', self::DEACTIVE => 'غیر فعال'];
    }

    public static function getArticleStatusWithStatusNumber(int $articleStatus)
    {
        return self::getArticleStatus()[$articleStatus];
    }
}
