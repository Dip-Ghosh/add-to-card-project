<?php

namespace App\Http\Controllers;

use App\Helper\ImageHelper;
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

    public function __construct(ProductInterface $product, CategoryInterface $category,ImageHelper $imageHelper){

        $this->product = $product;
        $this->category = $category;
        $this->imageHelper = $imageHelper;
    }

    public function index(){

        $products = $this->product->getActiveProducts();
        return view('backend.product.list',compact('products'));
    }

    public function create()
    {
        $categories = $this->category->getAllActiveCategory();
        return view('backend.product.create',compact('categories'));
    }

    public function store(ProductValidationRequest $request)
    {
        $data = $this->imageHelper->prepareData($request->except('_token'));
        $this->product->save($data);
        return redirect()->route('products.index')->with('success','Produt Created Successfully');
    }

    public function edit($id)
    {
        $categories = $this->category->getAllActiveCategory();
        $product = $this->product->edit($id);
        return view('backend.product.edit',compact('product','categories'));
    }

    public function update(ProductValidationRequest $request, $id)
    {
        $request['id'] = $id;
        $data = $this->imageHelper->prepareData($request->except('_token'));
        $this->product->update($data,$id);
        return redirect()->route('products.index') ->with('success','Category Updated Successfully');
    }

    public function destroy($id)
    {
        $this->product->delete($id);
        return redirect()->back() ->with('success','Product Deleted Successfully');
    }



}
