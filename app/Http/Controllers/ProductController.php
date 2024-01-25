<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade;
use App\Services\CategoryService;

class ProductController extends Controller
{
    public function show($cat,$product_id){
        $item = Product::where('id',$product_id)->first();
        $products = Product::orderBy('price')->take(4)->get();
 

        return view('product.show',[
            'item' => $item,
            'products' => $products
        ]);
    }

       

     public function showCategory(Request $request, $cat_alias)
    {
        $products = $this->categoryService->getProductsForCategory($cat_alias, $request->orderBy);

        if ($request->ajax()) {
            return view('ajax.order-by', ['products' => $products])->render();
        }

        return view('categories.index', ['cat' => $cat, 'products' => $products]);
    }

}
