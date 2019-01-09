<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class Oprator extends Model
{
    use Presentable;
    protected $guarded = ['id'];

    public function areaCodes()
    {
        return $this->belongsToMany(Areacode::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
