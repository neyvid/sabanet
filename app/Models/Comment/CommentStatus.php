<?php


namespace App\Models\Comment;


class CommentStatus
{
    const ACTIVE = 1;
    const DEACTIVE = 0;

    public static function getCommentSatus()
    {
        return [self::DEACTIVE => 'تاییدنشده', self::ACTIVE => 'تاییدومنتشرشده'];
    }

    public static function get_Comment_status_With_Status_Number(int $status)
    {
        return self::getCommentSatus()[$status];
    }

    public static function getClassForStatus(int $status)
    {
        return
            [
                self::ACTIVE => 'fa fa-check-circle text-green',
                self::DEACTIVE => 'fa fa-ban text-red',
            ][$status];
    }
}
