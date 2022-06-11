<?php

namespace App\Helper;

use App\Repository\Product\ProductInterface;
use Carbon\Carbon;
use Illuminate\Http\File;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class ImageHelper
{
    protected $product;

    public function __construct(ProductInterface $product){

        $this->product = $product;
    }

    public function checkImage($data){

        $path = public_path('uploads');
        if(!empty($data['image'])){
            $this->checkExistingImage($data);

            $image = $data['image'];
            $imageName = time().mt_rand() . "_" .\File::extension($image);
            $image->move($path,$imageName);

        }else{
            $image = public_path() .'/uploads/close.png'; ;
            $imageName = time().mt_rand() . "_" .\File::extension($image);
            $image->move($path,$imageName);
        }
        return $imageName;
    }

    private function checkExistingImage($data){

        if(isset($data['id']) && !empty($data['id']) && !empty($data['image'])){
            $product = $this->product->findById($data['id']);
            if(!empty($product['image'])){
                $filename = public_path() . '/upload/' . $product['image'];
                \File::delete($filename);
            }
        }

    }



}
