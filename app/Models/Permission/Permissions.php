<?php


namespace App\Models\Permission;


class Permissions
{
    CONST TOTALACCESS='1';
    CONST SUPPORTERACCESS='2';
    CONST USERACCESS='3';

    public static function getPermission()
    {
        return [
            self::TOTALACCESS=>'دسترسی کل',
            self::SUPPORTERACCESS=>'دسترسی پشتیبان',
            self::USERACCESS=>'دسترسی کاربر',
        ];
    }

    public static function getPermissionName(int $permission)
    {
        return self::getPermission()[$permission];
    }

}
