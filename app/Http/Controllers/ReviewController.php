<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Product $product)
    {
        return view('products.show', [
            'products' => $product,
        ]);
    }

    public function create()
    {
        return view('products.show');
    }

    public function store(Request $request, Product $product)
    {
        request()->validate([
            'name' => 'required|min:3',
            'note' => 'required',
            'message' => 'required|min:5',
        ]);


        $comment = Review::create([
            'name' => request('name'),
            'note' => request('note'),
            'message' => request('message'),
            'product_id' => $product->id,

        ]);
        $product->reviews()->save($comment);
        return redirect('/product/'.$product->id.'.html')->with('status', 'Votre avis a été envoyé.');
    }
}
