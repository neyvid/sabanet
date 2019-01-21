<?php


namespace App\Repositories\ServiceRepository;


use App\Models\Service;
use App\Repositories\Contract\BaseRepository;

class ServiceRepository extends BaseRepository
{

    public function __construct()
    {
        $this->model=Service::class;
    }
}
