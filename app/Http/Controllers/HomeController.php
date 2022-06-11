<?php

namespace App\Http\Controllers;

use App\Repository\Category\CategoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct( CategoryInterface $category){

        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->getAllActiveCategory();
        return view('main',compact('categories'));
    }
}
