<?php


namespace App\Repositories\OrderRepository;


use App\Models\Order;
use App\Repositories\Contract\BaseRepository;

class OrderRepository extends BaseRepository

{
    public function __construct()
    {
        $this->model=Order::class;
    }
}
