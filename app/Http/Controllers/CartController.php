<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use App\Category;
use App\Order;
use App\OrderItem;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CartController extends Controller
{

    public function index(Request $request){
        $req=\Cart::session($_COOKIE['cart_id'])->getContent('id');
        $cartCollection = \Cart::getContent();
        $sum = \Cart::getTotal('price');

         if (\Cart::getContent()->count() == 0) {
            return redirect()->route('home');
        } else {
        return view('cart.index',[
            'req' => $req,
            'cartCollection' => $cartCollection,    
            'sum' => $sum
        ]);
    }
}


    public function cartplace(){
        return view('cart.cartplace');
    }

    public function addToCart(Request $request){
        $product = Product::where('id', $request->id)->first();

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => [
                'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.png'
            ]
        ]);

        return response()->json(\Cart::getContent());
    }

        public function destroy($id)
    {
         $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id)->remove($id);

        return back();
    }

    public function saveOrder(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:55',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|max:255',
             ]);


            // валидация пройдена, сохраняем заказ
       $cartCollection = \Cart::getContent();
        $review = new Order();
  
        $review->name = $request->input('name');
        $review->email = $request->input('email');
        $review->price = $sum = \Cart::getTotal('price');
        $review->address = $request->input('address');
        $review->phone = $request->input('phone');
        $review->comment = $request->input('comment');
             $review->save();
         
                return redirect()
            ->route('cart.saveorder');
    }

     public function result(Request $request){
        $cart=\Cart::session($_COOKIE['cart_id'])->getContent('id');
        $cartCollection = \Cart::getContent();
        $sum = \Cart::getTotal('price');
          
        
         return view ('cart.result', [
            'cart' => $cart,
            'sum' => $sum,
            'cartCollection' => $cartCollection, 
            ]);
    
    }
}
