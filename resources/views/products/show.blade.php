@extends('layouts.base')

@section('content')
<section class="jumbotron text-center">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1 class="jumbotron-heading">{{ $product->nom }}</h1>
        <p class="lead text-muted mb-0">{{ $product->description }}</p>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="category.html">Catégorie</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Produit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Produit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-bs-toggle="modal" data-bs-target="#productModal">
                        <img class="img-fluid" src="{{ $product->cover }}" />
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="price">{{ $product->prix-($product->promo/100)*$product->prix }} &euro;</p>
                    @if ($product->promo != null)
                    <p class="price_discounted">{{ $product->prix }} &euro;</p>
                    @endif
                    <form method="post" action="/cart/{{ $product->id }}.html">
                        @csrf
                        <div class="mb-3">
                            <label for="colors">Couleur</label>
                            <select class="form-select" id="colors" name="colors">
                                <option selected>Choisir</option>
                                @foreach ($product->couleurs as $couleur)
                                <option value="{{ $couleur }}">{{ $couleur }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Quantité :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success btn-lg w-100 text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Ajouter
                        </button>
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Livraison rapide</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Paiement sécurisé</li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                        </ul>
                    </div>
                    <div class="reviews_product p-3 mb-2 ">
                        {{ $nb }} avis
                        @for ($i = 0; $i < round($product->moyenne); $i++)
                        <i class="fa fa-star"></i>
                        @endfor
                        ({{ $product->moyenne }}/5)
                        <a class="pull-right" href="#reviews">Voir tous les avis</a>
                    </div>
                    <div class="datasheet p-3 mb-2 bg-info text-white">
                        <a href="" class="text-white"><i class="fa fa-file-text"></i> Télécharger la fiche produit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                    <p class="card-text">{!! Str::markdown($product->description) !!}</p>
                </div>
            </div>
        </div>

        <!-- Reviews -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Avis</div>
                <div class="card-body">
                @foreach ($product->reviews as $review)
                    <div class="review">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                        <meta itemprop="datePublished" content="01-01-2016">{{ $review->created_at }}
                        @for ($i = 0; $i < $review->note; $i++)
                            <span class="fa fa-star"></span>
                        @endfor
                        par {{ $review->name }}
                        <p class="blockquote">
                            <p class="mb-0">{{ $review->message }}</p>
                        </p>
                        <hr>
                    </div>
                    @endforeach

                    <form action="/products/{{ $product->id }}.html" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="note">Note</label>
                            <select name="note" class="form-select" id="note">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection