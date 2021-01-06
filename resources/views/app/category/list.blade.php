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

        <form id="create-form" v-bind:action="action" method="post" class="row text-end d-flex justify-content-end mb-5">

            @csrf

            <input type="hidden" name="category_id" v-bind:value="category.id">

            <div class="col col-6">
                <div class="row">
                    <div class="col p-0">
                        <input type="text" name="name" class="form-control w-100" v-bind:value="category.name" placeholder="Nova categoria">
                    </div>
                    <div class="col text-start">
                        <button type="submit" class="btn btn-primary fw-600 ml-1">cadastrar</button>
                    </div>
                </div>
            </div>

        </form>

        @if (count($categories))
            @foreach ($categories as $category)
                <p class="note note-light small rounded-0 fw-500 m-0 mb-2">
                    {{ $category->name }} <span class="badge fw-400 rounded-1 bg-secondary">{{ $category->slug }}</span>
                    <br>
                    <button v-on:click="update({{ $category }})" type="button" class="btn btn-sm btn-dark fw-600 my-3">atualizar</button>
                    <button type="button" class="btn btn-sm btn-danger fw-600 my-3">deletar</button>
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
                        action: '{{ route("app.category.store") }}',
                        category: {
                            id: null,
                            name: null
                        }
                    }
                },

                methods: {
                    update(category)
                    {
                        this.category.id = category.id
                        this.category.name = category.name
                        this.action = '{{ route("app.category.update") }}'
                    }
                }
            }
        )
    
    </script>
@endsection