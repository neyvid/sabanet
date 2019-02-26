<?php


namespace App\Services\Payment\Contract;



abstract class OnlineGateway
{
    abstract public function paymentRequest(array $params);

    abstract public function verifyPayment( $Authority, $status);

}
