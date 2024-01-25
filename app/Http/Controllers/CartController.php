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
use App\Services\CartService;
use App\Services\CartIndexService;
use App\Http\Requests\SaveOrderRequest;

class CartController extends Controller
{

     private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

     public function index(Request $request)
    {
        $cartId = $_COOKIE['cart_id'];
        $indexData = $this->cartIndexService->getIndexData($cartId);

        if ($indexData['cartCollection']->isEmpty()) {
            return redirect()->route('home');
        }

        return view('cart.index', $indexData);
    }

    public function cartplace(){
        return view('cart.cartplace');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('id');
        $quantity = $request->input('qty');
        $cartId = $_COOKIE['cart_id'];

        $cartContent = $this->cartService->addToCart($productId, $quantity, $cartId);

        return response()->json($cartContent);
    }

        public function destroy($id)
    {
        $cartId = $_COOKIE['cart_id'];
        $productId = $id;

        $cartContent = $this->cartService->removeFromCart($cartId, $productId);

        return back();
    }

   public function saveOrder(SaveOrderRequest $request)
    {
        $cartCollection = $this->cartService->getCartContent();
        $sum = $this->cartService->getTotalPrice();

        $this->cartService->saveOrder($request->validated(), $cartCollection, $sum);

        return redirect()->route('cart.saveorder');
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
