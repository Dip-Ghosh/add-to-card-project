<?php

namespace App\Repository\Product;


use App\Models\Product;
use App\Repository\Base\BaseInterface;
use App\Repository\Base\BaseRepository;
use Illuminate\Support\Facades\DB;

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
            ->leftjoin('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.name as category_name')
            ->orderBy('products.id', 'desc')
            ->get();

    }

    public function getProductById($id){

        return $this->product->where('id', $id)->first();
    }


}
