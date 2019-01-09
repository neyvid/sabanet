<?php


namespace App\Repositories\StateRepository;


use App\Models\State;
use App\Repositories\Contract\BaseRepository;

class StateRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model=State::class;
    }

}
