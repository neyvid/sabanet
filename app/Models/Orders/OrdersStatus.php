<?php


namespace App\Models\Orders;


class OrdersStatus
{
    const UNPAID = 0;
    const PAID = 1;
    const CANCELED = 2;
    const REFUNDED = 3;
    const DELIVERED = 4;
    const SENT = 5;
    const SEND_READY = 6;

    public static function getOrderStatuses()
    {
        return [
            self::UNPAID => 'پرداخت نشده',
            self::PAID => 'پرداخت شده',
            self::DELIVERED => 'تحویل  شده',
            self::CANCELED => 'لغو شده',
            self::REFUNDED => 'مرجوع شده',
            self::SENT => 'ارسال شده',
            self::SEND_READY => 'آماده ارسال'
        ];
    }

    public static function getOrderStatus(int $status)
    {
        return self::getOrderStatuses()[$status];
    }
}
