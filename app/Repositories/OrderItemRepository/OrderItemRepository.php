<?php


namespace App\Repositories\OrderItemRepository;


use App\Models\OrderItem;
use App\Repositories\Contract\BaseRepository;

class OrderItemRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = OrderItem::class;
    }
}
