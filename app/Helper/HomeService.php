<?php

namespace App\Helper;

class HomeService
{

    public function addItemToCart($product, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }
        else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return session()->flash('success', 'Product add successfully');
    }

    public function removeItemFromCart($request)
    {

        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return session()->flash('success', 'Product removed successfully');

    }
}
