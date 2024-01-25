<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    public function getById($productId)
    {
        return Product::find($productId);
    }
}