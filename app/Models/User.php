<?php

namespace App\Models;

use App\Presenters\Contract\Presentable;
use App\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, Presentable, HasRoles;
    protected $presenter = UserPresenter::class;
    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function scopeGett($query)
    {
        return $query->where('id','!=',Auth::user()->id);
    }


}
