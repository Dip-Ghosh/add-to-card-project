<?php

namespace App\Helper;

class HomeService
{

    public function addItemToCart($product, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $product['quantity'];
        }
        else {
            $cart[$id] = [
                "name" => $product['name'],
                "quantity" => ($product['quantity'] > 0) ? $product['quantity'] : 1,
                "price" => $product['price'],
                "image" => $product['image']
            ];
        }
        session()->put('cart', $cart);
    }

    public function removeItemFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }

    public function updateToCart($request){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = ($request->quantity > 0) ? $request->quantity : 1;
        session()->put('cart', $cart);
    }
}
