<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Repositories\OrderItemRepository\OrderItemRepository;
use App\Repositories\OrderRepository\OrderRepository;
use App\Services\CalculateTotalPrice\calculateTotalPrice;
use App\Services\Payment\OnlineGateways\ZarinPall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderItemRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->orderItemRepository = new OrderItemRepository();
    }


    public function create()
    {
        if(session()->has(['areacode', 'clientNumber', 'opratorId', 'service','userType','confirmContract'])){
            $orderItems = [session()->get('service')];
            $service = session('service');
            $userType = session('userType');
            $clientNumber = session('clientNumber');
            session()->forget(['areacode', 'clientNumber', 'opratorId', 'service', 'net-equ', 'pc-equ', 'userType', 'confirmContract']);
            $equpments = calculateTotalPrice::checkIsEquipmentInOrder();
            $priceInfo = calculateTotalPrice::calculateTotalPrice($service, $equpments);
            $orderItemsForInsert = [];
            if ($equpments != null) {
                foreach (array_values($equpments) as $equip) {
                    array_push($orderItems, $equip);
                }
            }
            $orderCreated = $this->orderRepository->create([
                'user_id' => Auth::user()->id,
                'orderNumber' => str_replace(':', '', Carbon::now()->format('H:i:s')) . mt_rand('100', '999'),
                'telForService' => $clientNumber,
                'user_type_order' => $userType,  //0 is normal and 1 is Company
                'price' => $priceInfo['totalPrice'],
                'discount_amount' => $priceInfo['discountOfService'] + $priceInfo['discountOfEquipment'],
                'payable_amount' => $priceInfo['totalPayablePrice'],
                'status' => 0,
            ]);
            foreach ($orderItems as $item) {
                $orderItemsForInsert[] = [
                    'order_id' => $orderCreated->id,
                    'price' => $item->price,
                    'discount' => $item->discount,
                    'payable_amount' => ($item->price) - ((($item->price) * ($item->discount)) / 100),
                    'item_id' => $item->id,
                    'item_type' => class_basename($item),
                ];
            }
            $createdOrderItems = $orderCreated->order_items()->createMany($orderItemsForInsert);
            if ($createdOrderItems) {
//            Go to GatWay payment
                session(['orderId' => $orderCreated->id]);
                $zarinpal = new ZarinPall();
                return $zarinpal->paymentRequest([
                    'Amount' => $orderCreated->payable_amount,
                    'Description' => 'توضیخات',
                    'Email' => 'n@m.com',
                    'Mobile' => '091310153',
                ]);
//            return ['save shod', session()->all()];

            }
        }
        return redirect()->route('checkSupport');

    }

    public function verifyPayment(Request $request)
    {

        $status = $request->Status;
        $Authority = $request->Authority;
        $zarinpal = new ZarinPall();
        $result = $zarinpal->verifyPayment($Authority, $status);
        return $result;
    }

    public function returnGateway()
    {
        return view('frontend.Order.returnOkGateway');

    }
}
