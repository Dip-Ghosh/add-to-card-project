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

    public function save(array $data)
    {
        return $this->model::create($data);
    }

    public function edit($id)
    {
        return $this->getId($id)->first();
    }

    public function update(array $data, $id)
    {
        return $this->getId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->getId($id)->delete();
    }

    /**
     * @details this function find the value by Id
     * @param $id
     * @return mixed
     */
    private function getId($id)
    {
       return $this->model::where('id', $id);

    }
}
