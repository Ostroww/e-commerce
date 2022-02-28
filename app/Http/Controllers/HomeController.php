<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $products)
    {
        $products = Product::inRandomOrder()->first();
        $products_2 = Product::inRandomOrder()->first();
        $products_3 = Product::inRandomOrder()->first();
        $coeur = Product::inRandomOrder()->select('cover')->where('coeur','1')->first();

        return view('base', [
            'products' => $products, 
            'products_2' => $products_2,
            'products_3' => $products_3,
            'coeur' => $coeur,
        ]);

    }
}