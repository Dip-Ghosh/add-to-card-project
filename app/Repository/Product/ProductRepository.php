<?php

namespace App\Repository\Product;


use App\Models\Product;
use App\Repository\Base\BaseInterface;
use App\Repository\Base\BaseRepository;

class ProductRepository extends BaseRepository implements ProductInterface,BaseInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->product = $product;
    }

    public function  getActiveProducts(){
        return $this->product
            ->leftjoin('categories','products.category_id','categories.id')
            ->select('products.*','categories.name as category_name')
            ->where('products.status','active')
            ->where('categories.status','active')
            ->orderBy('products.id', 'desc')
            ->get();

    }
}
