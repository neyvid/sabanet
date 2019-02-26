<?php


namespace App\Services\Payment\OnlineGateways;


use App\Models\Order;
use App\Models\Orders\OrdersStatus;
use App\Repositories\OrderRepository\OrderRepository;
use App\Services\Payment\Contract\OnlineGateway;
use Carbon\Carbon;
use http\Env\Request;
use nusoap_client;

class ZarinPall extends OnlineGateway
{

    protected $MerchantId;
    protected $CallbackURL;
    protected $client;
    protected $amount;
    protected $orderRepository;

    public function __construct()
    {
        $this->MerchantId = '123';
        $this->CallbackURL = route('verifyPayment');
        $this->client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $this->orderRepository = new OrderRepository();
    }

    public function paymentRequest(array $params)
    {
        $this->amount = $params['Amount'];
        $result = $this->client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantId,
                'Amount' => $params['Amount'],
                'Description' => $params['Description'],
                'Email' => $params['Email'],
                'Mobile' => $params['Mobile'],
                'CallbackURL' => $this->CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            return redirect('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            return 'مشکلی در پرداخت بوجود آمده است';
        }
    }

    public function verifyPayment($Authority, $status)
    {
        if (session()->has('orderId') && !empty(session('orderId'))) {
            $orderId = session('orderId');
            $currentOrder = $this->orderRepository->find($orderId);
            if ($status == 'OK') {
                $result = $this->client->PaymentVerification(
                    [
                        'MerchantID' => $this->MerchantId,
                        'Authority' => $Authority,
                        'Amount' => $currentOrder->payable_amount,
                    ]
                );

                if ($result->Status == 100) {
                    $currentOrder->status = OrdersStatus::PAID;
                    $currentOrder->save();
                    return view('frontend.Order.returnOkGateway', ['status' => $result]);
//                return 'Transaction success. RefID:'.$result->RefID.Carbon::now()->format('Y');
                } else {
                    return view('frontend.Order.returnNoGateway');
//                    return 'Transaction failed. Status:' . $result->Status;
                }
            } else {
                return 'Transaction canceled by user';
            }
        }



    }

}
