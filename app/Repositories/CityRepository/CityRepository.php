<?php


namespace App\Repositories\CityRepository;


use App\Models\City;
use App\Repositories\Contract\BaseRepository;

class CityRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=City::class;
    }

}
