<?php

namespace App\Http\Controllers;

use App\Helper\HomeService;
use App\Models\Product;
use App\Repository\Category\CategoryInterface;
use App\Repository\Product\ProductInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $category;
    protected $product;
    protected $homeService;

    public function __construct( CategoryInterface $category,ProductInterface $product,HomeService $homeService){

        $this->category = $category;
        $this->product = $product;
        $this->homeService = $homeService;

    }

    public function index(){

        $data = [];
        $categories = $this->category->getActiveCategory();
        $products = $this->product->getActiveProducts();

        foreach($products as $val){
            if(!isset($data[$val['category_name']])){
                $data[$val['category_name']] = [];
            }
            $data[$val['category_name']][] = $val;
        }

        return view('main',compact('categories','data'));
    }

    public function getProduct($id)
    {
        $product = $this->product->findById($id);
        return view('products.product-details',compact('product'));
    }

    public function getCart(){

        return view('products.shopping-cart');
    }

    public function add($id,Request $request)
    {
        $product = $this->product->findById(intval($id));
        $product->quantity = $request->qty;
        $this->homeService->addItemToCart($product,$id);
        return session()->flash('success', 'Product added to cart successfully');
    }

    public function update(Request $request,$id)
    {
        if(intval($id) && $request->quantity){
            $this->homeService->updateToCart($request);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove($id)
    {
        if(intval($id)){
            $this->homeService->removeItemFromCart(intval($id));
            return session()->flash('success', 'Product removed from cart successfully');
        }
    }

    public function register(){

        return view('login.signup');
    }
}
