<?php


namespace App\Presenters\Contract;


trait Presentable
{

    protected $presenterInstance;

    public function present()
    {
        if (!$this->presenter || !class_exists($this->presenter)) {
            throw new \Exception('presenter property not found.');
        }
        $this->presenterInstance = new $this->presenter($this);
        return $this->presenterInstance;

    }

}
