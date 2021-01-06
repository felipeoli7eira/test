@extends('template')

@section('title', 'Laravel | Login')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar', ['current' => 'category.create'])
    @endcomponent

    <div class="container mt-5 pt-5">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger fw-500">{{ $error }}</div>
            @endforeach
        @endif

        <form action="{{ route('app.category.store') }}" method="post" class="row">

            @csrf

            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nova categoria">
            </div>

            <div class="col">
                <button class="btn btn-primary">cadastrar</button>
            </div>

        </form>
    </div>

@endsection

@section('js')
@endsection