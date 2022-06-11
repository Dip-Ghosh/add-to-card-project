<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Repository\Base\BaseInterface;
use App\Repository\Base\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryInterface,BaseInterface
{

    protected $category;

    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->category = $category;
    }

    public function  getAllActiveCategory(){
        return $this->category->where('status','active')->orderBy('id', 'desc')->get();

    }
}
