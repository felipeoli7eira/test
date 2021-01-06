@extends('template')

@section('title', 'Laravel | Produtos')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5 pt-5" id="product-list-component">
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

                            <form action="{{ route('app.product.delete', ['id' => $product->id]) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button class="btn btn-danger fw-600 btn-sm">deletar</button>
                            </form>

                            <a data-mdb-toggle="modal" data-mdb-target="#exampleModal" href="#!" class="btn btn-primary btn-sm fw-600" v-on:click="update({{ $product }})" >editar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Nenhum produto</p>
        @endif


        <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form method="post" v-bind:action="url" enctype="multipart/form-data">
            
                    @csrf
                    @method('put')

                    <input type="hidden" name="product_id" v-bind:value="product.id">
            
                    <div>
            
                        <div class="col col-12 bg-white p-5 rounded-2 shadow-2 mx-auto">
            
                            <div class="form-outline mb-4">
                                <input type="text" name="title" required id="name" v-bind:value="product.name" class="form-control" />
                                <label class="form-label" for="name">Nome</label>
                            </div>
            
                            <div class="form-outline mb-4">
                                <textarea name="description" class="form-control" id="desc" cols="30" rows="5">{product.description}</textarea>
                                <label class="form-label" for="desc">Descrição</label>
                            </div>
            
                            <div class="form-outline mb-4">
                                <input type="number" step="0.01" name="price" required v-bind:value="product.price" id="price" class="form-control" />
                                <label class="form-label" for="price">Preço</label>
                            </div>
            
                            <div class="form-outline mb-4">
                                <input type="number" name="stock" required id="stock" class="form-control" v-bind:value="product.stock" />
                                <label class="form-label" for="stock">Quantidade em estoque</label>
                            </div>
            
                            <div class="mb-4">
                                <label class="form-label d-inline fw-500" for="stock">Categoria</label>
                                <select v-model="product.category" name="category_id" class="form-control">
                                    <option value="#"></option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
            
                            <input type="file" id="input-file" name="photo" required class="form-control mb-4">
            
                            <button type="submit" class="btn btn-success fw-500">pronto</button>
            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button v-on:click="clear" type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
            </div>
            </div>
        </div>
        </div>

    </div>

@endsection

@section('js')
    <script>
            new Vue(
                {
                    delimiters: ['{', '}'],

                    el: '#product-list-component',

                    data()
                    {
                        return {
                            
                            product: {
                                id: 0,
                                name: null,
                                description: null,
                                price: null,
                                stock: null,
                                category: null
                            },
                            url: '{{ route("app.product.update") }}'
                        }
                    },

                    methods: {

                        update(product)
                        {
                            this.product.id = product.id
                            this.product.name = product.title
                            this.product.description = product.description
                            this.product.price = product.price
                            this.product.stock = product.stock
                            this.product.category = product.category
                        },

                        clear()
                        {
                            this.product.id = null
                            this.product.name = null
                            this.product.description = null
                            this.product.price = null
                            this.product.stock = null
                            this.product.category = null
                        },

                    }
                }
            )
    </script>
@endsection