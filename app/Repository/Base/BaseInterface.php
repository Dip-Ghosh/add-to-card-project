<?php

namespace App\Repository\Base;

interface BaseInterface
{
    public function save(array $data);

    public function findById($id);

    public function update($id,$data);

    public function delete($id);
}
