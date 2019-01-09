<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Presentable;
    protected $guarded=['id'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
