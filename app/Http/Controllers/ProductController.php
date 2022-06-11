<?php

namespace App\Http\Controllers;

use App\Helper\ImageHelper;
use App\Helper\ProductService;
use App\Http\Requests\ProductValidationRequest;
use App\Repository\Category\CategoryInterface;
use App\Repository\Product\ProductInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $category;
    protected $imageHelper;
    protected $productService;

    public function __construct(ProductInterface $product, CategoryInterface $category,ImageHelper $imageHelper,ProductService $productService){

        $this->product = $product;
        $this->category = $category;
        $this->imageHelper = $imageHelper;
        $this->productService = $productService;
    }

    public function index(){

        $products = $this->product->getActiveProducts();
        return view('backend.product.list',compact('products'));
    }

    public function create()
    {
        $categories = $this->category->getActiveCategory();
        return view('backend.product.create',compact('categories'));
    }

    public function store(ProductValidationRequest $request)
    {

        $request['imageName'] = $this->imageHelper->checkImage($request->only('image'));
        $data = $this->productService->prepareData($request->except('_token'));

        $this->product->save($data);
        return redirect()->route('products.index')->with('success','Produt Created Successfully');
    }

    public function edit($id)
    {
        $categories = $this->category->getActiveCategory();
        $product = $this->product->findById($id);
        return view('backend.product.edit',compact('product','categories'));
    }

    public function update(ProductValidationRequest $request, $id)
    {
        $request['id'] = $id;
        $request['imageName'] = $this->imageHelper->checkImage($request->only('image','id'));

        $data = $this->productService->prepareData($request->except('_token'));
        $this->product->update($id,$data);
        return redirect()->route('products.index') ->with('success','Category Updated Successfully');
    }

    public function destroy($id)
    {
        $this->product->delete($id);
        return redirect()->back() ->with('success','Product Deleted Successfully');
    }



}
