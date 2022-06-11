<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryValidationRequest;
use App\Repository\Category\CategoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct( CategoryInterface $category){

        $this->category = $category;
    }

    public function index(){

        $categories = $this->category->getAllActiveCategory();
        return view('backend.category.list',compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryValidationRequest $request)
    {
        $data = [
            'name'=>$request->category,
            'created_at'=>Carbon::now()
        ];

        $this->category->save($data);

        return redirect()->route('category.index')->with('success','Category Created Successfully');
    }


    public function edit($id)
    {

        $data = $this->category->edit($id);
        return view('backend.category.edit',compact('data'));
    }


    public function update(CategoryValidationRequest $request, $id)
    {
        $data = [
            'name'=>$request->category,
            'updated_at'=>Carbon::now()
        ];
        $this->category->update($data,$id);
        return redirect()->route('category.index') ->with('success','Category Updated Successfully');
    }


    public function destroy($id)
    {
        $this->category->delete($id);
        return redirect()->back() ->with('success','Category Deleted Successfully');
    }
}
