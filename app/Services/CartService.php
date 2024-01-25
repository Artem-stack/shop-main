<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class CartService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function addToCart($productId, $quantity, $cartId)
    {
        $product = $this->productRepository->getById($productId);

        \Cart::session($cartId)->add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $quantity,
            'attributes' => [
                'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.png'
            ]
        ]);

        return \Cart::getContent();
    }

     public function saveOrder(array $data, $cartCollection, $sum)
    {
        $review = $this->orderRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'price' => $sum,
            'address' => $data['address'],
            'phone' => $data['phone'],
            'comment' => $data['comment'],
        ]);

    public function removeFromCart($cartId, $productId)
    {
        \Cart::session($cartId)->remove($productId);

        return \Cart::getContent();
    }

}