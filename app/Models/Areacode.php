<?php

namespace App\Models;

use App\Presenters\AreaCodePresenter;
use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class Areacode extends Model
{
    use Presentable;
    protected $guarded = ['id'];
    protected $presenter=AreaCodePresenter::class;

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function oprators()
    {
        return $this->belongsToMany(Oprator::class);
    }

    public function telecomcenter()
    {
        return $this->belongsTo(Telecomcenter::class);
    }


}
