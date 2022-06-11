<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryInterface;
use App\Repository\Product\ProductInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $category;
    protected $product;

    public function __construct( CategoryInterface $category,ProductInterface $product){

        $this->category = $category;
        $this->product = $product;
    }

    public function index(){

        $data = [];
        $categories = $this->category->getAllActiveCategory();
        $products = $this->product->getActiveProducts();

        foreach($products as $val){
            if(!isset($data[$val['category_name']])){
                $data[$val['category_name']] = [];
            }
            $data[$val['category_name']][] = $val;
        }

        return view('main',compact('categories','data'));
    }

    public function getProdcutDetails($id)
    {
        $product = $this->product->getProductById($id);
        return view('products.product-details',compact('product'));
    }
}
