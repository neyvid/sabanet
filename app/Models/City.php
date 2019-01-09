<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Presentable;
    protected $guarded=['id'];

    public function areaCodes()
    {
        return $this->belongsToMany(Areacode::class);

    }

    public function teleComeCenters()
    {
        return $this->hasMany(Telecomcenter::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}

