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

    public function getCart(){

        return view('products.shopping-cart');
    }

    public function addToCart( Request $request,$id)
    {
        $product = $this->product->getProductById($id);
        $product->quantity = $request->qty;
        $this->homeService->addItemToCart($product,$id);
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id){
            $this->homeService->removeItemFromCart($request);
        }
    }


    public function register(){

        return view('login.signup');
    }
}
