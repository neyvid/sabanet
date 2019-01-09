<?php


namespace App\Models\Roles;


class Roles
{
    const MANAGER=1;
    const SUPPORTER=2;
    const USER=3;

    public static function getRoles()
    {
        return [
          self::MANAGER=>'مدیرکل',
          self::SUPPORTER=>'پشتیبان',
          self::USER=>'کاربر',
        ];
    }

    public static function getRoleName(int $role)
    {
        return self::getRoles()[$role];
    }

}
