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

    </div>

@endsection

@section('js')
@endsection