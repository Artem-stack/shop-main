<?php

namespace App\Services;

use App\Category;
use App\Product;

class CategoryService
{
    public function getProductsForCategory($catAlias, $orderBy)
    {
        $cat = Category::where('alias', $catAlias)->first();
        $paginate = 4;

        $query = Product::where('category_id', $cat->id);

        switch ($orderBy) {
            case 'price-low-high':
                $query->orderBy('price');
                break;
            case 'price-high-low':
                $query->orderBy('price', 'desc');
                break;
            case 'name-a-z':
                $query->orderBy('title');
                break;
            case 'name-z-a':
                $query->orderBy('title', 'desc');
                break;
        }

        $products = $query->paginate($paginate);

        return $products;
    }
}