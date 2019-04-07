<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Roles\Roles;
use App\Repositories\OrderRepository\OrderRepository;
use App\Repositories\ProductRepository\ProductRepository;
use App\Repositories\ServiceRepository\ServiceRepository;
use App\Services\JalaliDate\JalaliDate;
use App\Services\Payment\OnlineGateways\ZarinPall;
use App\Services\Payment\PaymentService;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    private $orderRepository;
    private $ProductRepository;
    private $ServiceRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->ServiceRepository = new ServiceRepository();
        $this->ProductRepository = new ProductRepository();
    }

    public function index()
    {
        $user = Auth::user();
        $orders = $user->Orders;
        return view('admin.order.index', compact('orders'));
    }

    public function pay(Request $request)
    {
        $order = $this->orderRepository->find($request->orderId);
        if ($order instanceof Order && $order->user_id == Auth::user()->id || Roles::MANAGER==Auth::user()->getRoleNames()[0]) {
            $paymentService = new PaymentService();
            return $paymentService->pay($order);
        }
        return abort(404);
    }

    public function showOrderDetails($orderId)
    {
        $currentOrder = $this->orderRepository->find($orderId);
        if (!$currentOrder instanceof Order || $currentOrder->user_id != Auth::user()->id) {
            return abort(404);
        }
        $orderItems=[];
        foreach ($currentOrder->order_items as $item) {
            $repository = $item->item_type . 'Repository';
            $item = $this->$repository->find($item->item_id);
            $orderItems[]=$item;
        }
        return view('admin.order.orderdetails',compact('orderItems','currentOrder'));
    }
}
