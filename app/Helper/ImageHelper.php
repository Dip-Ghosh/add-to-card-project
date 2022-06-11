<?php

namespace App\Helper;

use App\Repository\Product\ProductInterface;
use Illuminate\Support\Facades\File;


class ImageHelper
{
    protected $product;

    public function __construct(ProductInterface $product){

        $this->product = $product;
    }

    public function checkImage($data){

        $path = public_path() .'/uploads/';

        if(!empty($data['image'])){

            if (isset($data['id']) && !empty($data['id'])) {

                $product = $this->product->findById($data['id']);
                $filename = public_path('/upload/'). $product['image'];

                if (File::exists($filename)) {
                    File::delete($filename);
                }
            }

            $image = $data['image'];
            $imageName = time(). "_" .mt_rand()."." .$image->getClientOriginalExtension();
            $image->move($path,$imageName);
            return $imageName;
        }
    }

}
