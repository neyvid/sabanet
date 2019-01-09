<?php


namespace App\Presenters;


use App\Presenters\Contract\Presenter;

class UserPresenter extends Presenter
{
    public function showName()
    {
        if ($this->name != null) {
            return $this->name;
        } elseif ($this->email != null) {
            return $this->email;
        } else {
            return $this->mobile;
        }

    }

}
