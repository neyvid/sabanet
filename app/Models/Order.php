<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use App\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Presentable;
    protected $presenter=OrderPresenter::class;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);

    }
}
