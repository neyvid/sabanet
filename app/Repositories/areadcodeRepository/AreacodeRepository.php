<?php


namespace App\Repositories\areadcodeRepository;


use App\Models\Areacode;
use App\Repositories\Contract\BaseRepository;

class AreacodeRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = Areacode::class;
    }

}
