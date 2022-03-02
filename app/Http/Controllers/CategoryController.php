<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category,
            'categories' => Category::all(),
            'last' => Product::latest('created_at')->first(),
        ]);
    }
}
