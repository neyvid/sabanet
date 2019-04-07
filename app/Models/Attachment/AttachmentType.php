<?php


namespace App\Models\Attachment;


class AttachmentType
{
    const IMAGE = 1;
    const DOCUMENT = 2;
    const VIDEO = 3;
    const AUDIO = 4;

    public static function getAllType()
    {
        return
            [
                self::IMAGE => 'تصویر',
                self::DOCUMENT => 'فایل',
                self::VIDEO => 'ویدیو',
                self::AUDIO => 'صوت'
            ];
    }

    public static function getTypeWithTypeNumber(int $type)
    {
        return self::getAllType()[$type];
    }

}
