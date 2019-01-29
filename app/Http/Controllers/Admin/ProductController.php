<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ProductRepository\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    public function index()
    {

    }
}
