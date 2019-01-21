<?php


namespace App\Repositories\telecomCenterRepository;


use App\Models\Telecomcenter;
use App\Repositories\Contract\BaseRepository;

class TelecomeCenterRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=Telecomcenter::class;
    }
}
