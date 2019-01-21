<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class Telecomcenter extends Model
{
    use Presentable;
    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function areacode()
    {
        return $this->hasMany(Areacode::class);
    }
}
