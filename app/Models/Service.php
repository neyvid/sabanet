<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Presentable;
    protected $guarded = ['id'];

    public function oprator()
    {
        return $this->belongsTo(Oprator::class);
    }

    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'attachable');
    }
}
