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

    <h1>Supprimer {{ $product->nom }}</h1>
    <form class="d-inline" action="/admin/product/{{ $product->id }}.html" method="post">
        @csrf @method('delete')
        <button class="btn btn-danger" onclick="return confirm('Voulez-vous supprimer la catégorie ?')">Supprimer</button>
    </form>
</main>
@endsection