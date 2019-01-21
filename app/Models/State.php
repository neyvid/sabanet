<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Presentable;
    protected $guarded = ['id'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function areaCodes()
    {
        return $this->hasMany(Areacode::class);
    }


//    For delete All city of State when delete one state
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($state) {
            $state->cities()->delete();
        });
    }
}
