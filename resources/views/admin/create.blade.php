@extends('layouts.admin')

@section('content')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Créer un produit</h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="coeur">Coup de coeur ?</label>
            <input type="radio" name="coeur" id="oui" value="1">Oui
            <input type="radio" name="coeur" id="non" value="0">Non
        </div>
        <div class="mb-3">
            <label for="couleur">Couleur</label>
            <input type="checkbox" name="couleur[]" id="bleu" value="bleu">Bleu
            <input type="checkbox" name="couleur[]" id="vert" value="vert">Vert
            <input type="checkbox" name="couleur[]" id="rouge" value="rouge">Rouge
        </div>
        <div class="mb-3">
            <label for="cover">Image</label>
            <input type="file" name="cover" id="cover" class="form-control">
        </div>
        <div class="mb-3">
            <label for="released_at">Promo</label>
            <input type="number" name="promo" id="promo" class="form-control" value="{{ old('promo') }}">
        </div>
        <div class="mb-3">
            <label for="category">Catégorie</label>
            <select name="category" id="category" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button class="btn btn-primary mt-3">Ajouter</button>
    </form>
    <div>
</div>
</main>
@endsection