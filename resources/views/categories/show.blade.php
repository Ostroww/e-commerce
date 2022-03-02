@extends('layouts.base')

@section('content')
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $category->name }}</h1>
        <p class="lead text-muted mb-0">Liste des {{ $category->name }}</p>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Catégorie</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Filtres</div>
                <form action="" method="post">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="bleu" class="form-check-input" id="color-bleu">
                                <label class="form-check-label" for="color-bleu">Bleu</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="rouge" class="form-check-input" id="color-red">
                                <label class="form-check-label" for="color-red">Rouge</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" name="color[]" value="vert" class="form-check-input" id="color-vert">
                                <label class="form-check-label" for="color-vert">Vert</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <button class="btn btn-primary w-100">Filtrer</button>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Catégories</div>
                <ul class="list-group category_block">
                @foreach ($categories as $category)
                    <li class="list-group-item"><a href="/category/{{ $category->id}} .html">{{ $category->name }}</a></li>
                @endforeach
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Dernier produit</div>
                <div class="card-body">
                    <img class="img-fluid" src="{{ $last->cover }}" />
                    <h5 class="card-title mt-3">{{ $last->nom }}</h5>
                    <p class="card-text">{{ Str::of($last->description)->limit(50, '...') }}</p>

                    <div class="row">
                        <div class="col">
                            <p class="btn btn-danger w-100">{{ $last->prix }} &euro;</p>
                        </div>
                        <div class="col">
                            <a href="product/{{ $last->id }}.html" class="btn btn-success w-100">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                @foreach ($category->products as $product)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $product->cover }}" alt="Card image cap" width="600px" height="200px">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">{{ $product->nom }}</a></h4>
                            <p class="card-text">{{ Str::of($product->description)->limit(50, '...') }}</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger w-100">{{ $product->prix }} &euro;</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success w-100">Ajouter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Précédent</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection