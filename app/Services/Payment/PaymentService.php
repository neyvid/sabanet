<?php


namespace App\Services\Payment;


use App\Models\Order;
use App\Services\Payment\OnlineGateways\ZarinPall;

class PaymentService
{

    public function pay(Order $order)
    {
        session(['orderId' => $order->id]);
        $zarinPal=new ZarinPall();
        $result=$zarinPal->paymentRequest([
            'Amount' => $order->payable_amount,
            'Description' => 'توضیخات',
            'Email' => 'n@m.com',
            'Mobile' => '091310153',
        ]);
        return $result;


    }

}
