<?php

namespace App\Http\Controllers;

use App\Helper\CategoryService;
use App\Http\Requests\CategoryValidationRequest;
use App\Repository\Category\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct( CategoryInterface $category,CategoryService $categoryService ){

        $this->category = $category;
        $this->categoryService = $categoryService;
    }

    public function index(){

        $categories = $this->category->getActiveCategory();
        return view('backend.category.list',compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryValidationRequest $request)
    {
        $data = $this->categoryService->prepareData($request->except('_token'));
        $this->category->save($data);
        return redirect()->route('category.index')->with('success','Category Created Successfully');
    }


    public function edit($id)
    {
        $data = $this->category->findById($id);
        return view('backend.category.edit',compact('data'));
    }


    public function update(CategoryValidationRequest $request, $id)
    {
        $data = $this->categoryService->prepareData($request->except('_token'));
        $this->category->update($id,$data);
        return redirect()->route('category.index') ->with('success','Category Updated Successfully');
    }


    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect()->back() ->with('success','Category Deleted Successfully');
    }
}
