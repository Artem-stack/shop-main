<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(){
        $products = Product::orderBy('price')->take(4)->get();

        return view('product.show',[
            'products' => $products
        ]);
    }
}
