<?php

namespace App\Services;

use Illuminate\Support\Facades\Cart;

class CartIndexService
{
    public function getIndexData($cartId)
    {
        $cartContent = Cart::session($cartId)->getContent();
        $sum = Cart::getTotal('price');

        return [
            'req' => $cartContent->pluck('id'),
            'cartCollection' => $cartContent,
            'sum' => $sum,
        ];
    }
}