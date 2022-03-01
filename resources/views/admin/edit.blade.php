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

    <h1>Modifier {{ $product->nom }}</h1>
    <form action="/admin/product/{{ $product->id }}.html" method="post">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Nom..." class="form-control" value="{{ old('name', $product->nom) }}">

        <button class="btn btn-primary mt-3">Modifier</button>
    </form>
</main>
@endsection