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

    public function updateToCart($request){
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);
        session()->flash('success', 'Cart updated successfully');
    }
}
