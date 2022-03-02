<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Product $product)
    {
        request()->validate([
            'quantity' => 'required|min:1',
            'colors' => 'required',
        ]);

        $cart = session('cart', []);

        $total = session('total');

        $total = 0;

        $cart[] = array(
            "name" => $product->nom,
            "price" => $product->prix,
            "quantity" => request('quantity'),
            "colors" => request('colors'),
        );
        if ($cart[0] != null) {

            foreach ($cart as $prod) {
                $total += $prod['price'];
            }
        }

        session([
            'cart' => $cart,
            'total' => $total,
        ]);

        return redirect('/cart.html')->with('status', 'Le produit '.$product->nom.' a été ajouté.');
    }

    public function delete(Product $product)
    {
        return view('cart.delete', [
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        session('cart'['prod'][$product->nom])->delete();

        return redirect('/cart.html')->with('status', 'Le produit '.$product->nom.' a été supprimé.');
    }    
}

