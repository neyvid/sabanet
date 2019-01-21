<?php


namespace App\Presenters;


use App\Presenters\Contract\Presenter;

class AreaCodePresenter extends Presenter
{
    public function showOpratorName()
    {
        $oprators='';
        foreach ($this->entity->oprators as $oprator){
            $oprators.=$oprator->name.' - ';
        }
        return rtrim($oprators,' - ');

    }

}
