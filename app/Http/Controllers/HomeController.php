<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Product $products)
    {
        return view('base', [
            'lasts' => Product::latest('created_at')->paginate(4),
            'products' => Product::inRandomOrder()->first(), 
            'products_2' => Product::inRandomOrder()->first(),
            'products_3' => Product::inRandomOrder()->first(),
            'coeur' => Product::inRandomOrder()->where('coeur','1')->first(),
            'sorted' => Product::all()->sortByDesc('moyenne')->take(4),
        ]);
    }
}