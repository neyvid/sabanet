<?php


namespace App\Repositories\Contract;


abstract class BaseRepository
{
    protected $model;

    public function all()
    {
        return $this->model::all();
    }

    public function create(array $data)
    {
        return $this->model::create($data);
    }

    public function find(int $id)
    {
        return $this->model::find($id);
    }

    public function update(int $id, array $data)
    {
        $item = $this->model::find($id);
        return $item->update($data);
    }

    public function delete(int $id)
    {
        $item = $this->model::find($id);
        return $item->delete();
    }

    public function findBy(array $criteria, $single = true)
    {
        $query = $this->model::query();
        foreach ($criteria as $key => $value) {
            $query->where($key, $value);
        }
        if ($single) {
            return $query->first();
        }
        return $query->get();

    }

}
