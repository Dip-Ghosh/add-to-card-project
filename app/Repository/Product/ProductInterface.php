<?php

namespace App\Repository\Product;

interface ProductInterface
{
    public function  getActiveProducts();

    public function  getProductById($id);

}
