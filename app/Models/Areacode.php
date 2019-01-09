<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class Areacode extends Model
{
    use Presentable;
    protected $guarded = ['id'];

    public function cities()
    {
        return $this->belongsToMany(City::class);

    }

    public function oprators()
    {
        return $this->belongsToMany(Oprator::class);
    }

    public function telecomCenter()
    {
        return $this->belongsTo(Telecomcenter::class);
    }
}
