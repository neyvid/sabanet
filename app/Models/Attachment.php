<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $guarded = ['id'];
    public $timestamps = false;

    public function services()
    {
        return $this->morphedByMany(Service::class,
            'attachable','attachables');
    }
}
