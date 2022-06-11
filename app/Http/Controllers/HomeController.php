<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

    public function getCart(){

        return view('products.shopping-cart');
    }

    public function addToCart( Request $request,$id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);


        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => isset($request->qty) ? $request->qty : 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
     exit;
//        return redirect($cart);
//        return redirect()->back()->with('success', 'Product added to cart successfully!');
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
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function register(){

        return view('login.signup');
    }
}
