<?php


namespace App\Models\User;


class UserStatus
{
    const ACTIVE=1;
    const DEACTIVE=0;

    public static function getUserStatus()
    {
        return [self::ACTIVE=>'فعال',self::DEACTIVE=>'غیرفعال'];
    }

    public static function getUserStatusWithStatusNumber(int $userStatus)
    {
        return self::getUserStatus()[$userStatus];
    }

    public static function getUserStatusIconClass(int $userStatus)
    {
        return [
            self::ACTIVE=>'fa fa-unlock fa-2x',
            self::DEACTIVE=>'fa fa-lock fa-2x',
        ][$userStatus];
    }

    public static function getUserStatusColorIcon(int $userStatus)
    {
        return [
            self::ACTIVE=>'color: #2a8544',
            self::DEACTIVE=>'color: #b90000',
        ][$userStatus];
    }

}
