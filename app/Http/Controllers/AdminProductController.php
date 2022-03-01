<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.products', [
            'products' => Product::all(),
        ]);
    }

    public function create()
    {
        return view('admin.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:99|max:1000',
            'coeur' => 'required',
            'couleur' => 'required',
            'cover' => 'required|image|max:1024',
            'promo' => 'numeric|nullable',
            'category' => 'exists:categories,id',
        ]);


        $product = Product::create([
            'nom' => request('name'),
            'description' => request('description'),
            'prix' => request('price'),
            'coeur' => request('coeur'),
            'couleurs' => request('couleur'),
            'cover' => '/storage/'.request('cover')->store('covers', 'public'),
            'promo' => request('promo'),
            'category_id' => request('category'),
            'slug' => Str::slug(request('name'), '-'),
        ]);
        return redirect('/admin.html')->with('status', 'Le produit '.$product->nom.' a été crée.');
    }

    public function edit(Product $product)
    {
        return view('admin.edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        // Vérifier les erreurs
        request()->validate([
            'name' => 'required|min:3',
        ]);

        // On modifie la catégorie dans la BDD
        $product->update([
            'nom' => request('name'),
        ]);

        return redirect('/admin/products.html')->with('status', 'Le produit '.$product->nom.' a été modifiée.');
    }

    public function delete(Product $product)
    {
        return view('admin.delete', [
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products.html')->with('status', 'Le produit '.$product->nom.' a été supprimé.');
    }    
}