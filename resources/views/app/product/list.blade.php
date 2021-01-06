@extends('template')

@section('title', 'Laravel | Produtos')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5 pt-5">
        <nav class="text-end mb-2">
            <a href="{{ route('app.product.create') }}" class="btn btn-info fw-500">cadastro</a>
        </nav>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger fw-500">{{ $error }}</div>
            @endforeach
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success fw-500">{{ session('success') }}</div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger fw-500">{{ session('error') }}</div>
        @endif

        @if (count($products))
            <div class="row">
                @foreach ($products as $product)
                <div class="col col-12 col-sm-4">
                    <div class="card">
                        <img
                        src="{{ asset("{$product->photo}") }}"
                        class="card-img-top"
                        alt="..."
                        />
                        <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">
                            {{ $product->description }}
                        </p>
                        <a href="#!" class="btn btn-danger">deletar</a>
                        <a href="#!" class="btn btn-primary">editar</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @else
            <p>Nenhum produto</p>
        @endif

    </div>

@endsection

@section('js')
@endsection