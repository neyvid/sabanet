<?php


namespace App\Repositories\ProductRepository;


use App\Models\Product;
use App\Repositories\Contract\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = Product::class;
    }

}
