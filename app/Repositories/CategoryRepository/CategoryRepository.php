<?php


namespace App\Repositories\CategoryRepository;


use App\Models\Category;
use App\Repositories\Contract\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=Category::class;
    }
}
