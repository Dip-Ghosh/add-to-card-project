<?php

namespace App\Helper;

use Carbon\Carbon;

class ProductService
{

    public function prepareData($data){

        $requestParam = [
            "category_id" => $data['category_id'],
            "name" => trim($data['name']),
            "description" =>trim($data['description']),
            "price" => $data['price'],
            "image" => isset($data['imageName'])?$data['imageName']:null
        ];

        if((isset($data['id']) && !empty($data['id']))){
            $requestParam['updated_at'] = Carbon::now();
        }else{
            $requestParam['created_at'] = Carbon::now();
        }

        return $requestParam;
    }

}
