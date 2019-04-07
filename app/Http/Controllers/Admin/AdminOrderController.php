<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OrderRepository\OrderRepository;
use App\Repositories\ProductRepository\ProductRepository;
use App\Repositories\ServiceRepository\ServiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    protected $orderRepository;


    public function __construct()
    {
        $this->orderRepository=new OrderRepository();

    }
    public function index()

    {
        $title='سفارش های کاربران';
        $allOrders=$this->orderRepository->all(['user','order_items']);   //Use EagerLoad(lazyLoad)
        return view('admin.order.admin.index',compact('allOrders','title'));

    }


}
