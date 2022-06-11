<?php

namespace App\Repository\Base;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function save($data)
    {
        return $this->model::create($data);
    }

    public function findById($id)
    {
        return $this->getId($id)->first();
    }

    public function update($id,$data)
    {
        return $this->getId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->getId($id)->delete();
    }

    private function getId($id)
    {
       return $this->model::where('id', $id);

    }

}
