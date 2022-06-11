<?php

namespace App\Helper;

use App\Repository\Product\ProductInterface;
use Carbon\Carbon;
use Illuminate\Http\File;

class ImageHelper
{
    protected $product;

    public function __construct(ProductInterface $product){

        $this->product = $product;
    }
    public function prepareData($data){

        $data['imageName'] = $this->checkExistingImage($data);
        return $this->requestParam($data);

    }

    private function checkExistingImage($data){

        $path = public_path('uploads');
        if(isset($data['id']) && !empty($data['id']) && !empty($data['image'])){
            $product = $this->product->edit($data['id']);
            if(!empty($product['image'])){
                $filename = public_path() . '/upload/' . $product['image'];
                \File::delete($filename);
            }
        }

        if(!empty($data['image'])){
            $image = $data['image'];
            $imageName = time().mt_rand() . "_" .\File::extension($image);
            $image->move($path,$imageName);
            return $imageName;
        }


    }

    private function requestParam($data)
    {
        $requestParam = [];

        if(isset($data['id']) && !empty($data['id'])){
            $requestParam = [
                "updated_at" => Carbon::now()
            ];
        }else{
            $requestParam = [
                "created_at" => Carbon::now()
            ];
        }
        $requestParam = [
            "category_id" => $data['category_id'],
            "name" => trim($data['name']),
            "description" =>trim($data['description']),
            "price" => $data['price'],
            "image" => isset($data['imageName'])?$data['imageName']:null
        ];
        return $requestParam;
    }


}
