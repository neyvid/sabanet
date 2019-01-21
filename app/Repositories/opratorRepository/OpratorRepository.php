<?php


namespace App\Repositories\opratorRepository;


use App\Models\Oprator;
use App\Repositories\Contract\BaseRepository;

class OpratorRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=Oprator::class;
    }

}
