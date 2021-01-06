@extends('template')

@section('title', 'Laravel | Categorias')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5" id="component-category-list">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger fw-500 rounded-1">{{ $error }}</div>
            @endforeach
        @endif

        <form v-show="!formEdit" id="create-form" action="{{ route('app.category.store') }}" method="post" class="row text-end d-flex justify-content-end mb-5">

            @csrf

            <div class="col col-6">
                <div class="row">
                    <div class="col p-0">
                        <input type="text" name="name" class="form-control w-100" placeholder="Nova categoria">
                    </div>
                    <div class="col text-start">
                        <button type="submit" class="btn btn-primary fw-600 ml-1">cadastrar</button>
                    </div>
                </div>
            </div>

        </form>

        <form v-show="formEdit" id="update-form" action="{{ route('app.category.store') }}" method="post" class="row text-end d-flex justify-content-end d-none mb-5">

            @csrf
            @method('put')

            <input type="hidden" name="category_id" value="">

            <div class="col col-6">
                <div class="row">
                    <div class="col p-0">
                        <input type="text" name="name" class="form-control w-100" placeholder="...">
                    </div>
                    <div class="col text-start">
                        <button type="submit" class="btn btn-secondary fw-600 ml-1">atualizar</button>
                    </div>
                </div>
            </div>

        </form>

        @if (count($categories))
            @foreach ($categories as $category)
                <p v-on:click="setForUpdate({{ $category }})" class="note note-light small rounded-0 fw-500 m-0 mb-2">
                    {{ $category->name }} <span class="badge fw-400 rounded-1 bg-secondary">{{ $category->slug }}</span>
                    <br>
                    <button type="button" class="btn btn-sm btn-dark fw-600 my-3">atualizar</button>
                </p>
            @endforeach
        @else
            <p class="note note-primary small rounded-1 fw-500">Nenhuma categoria para listar</p>
        @endif
    </div>

@endsection

@section('js')
    <script>

        new Vue(
            {
                delimiters: ['{', '}'],

                el: '#component-category-list',

                data()
                {
                    return {
                        formEdit: false
                    }
                },

                methods: {
                    setForUpdate(id)
                    {
                        console.log(id)
                        this.formEdit = true
                    }
                }
            }
        )
    
    </script>
@endsection