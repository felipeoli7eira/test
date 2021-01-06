@extends('template')

@section('title', 'Laravel | Produtos')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <form class="container my-5" method="post" action="{{ route('app.product.store') }}" enctype="multipart/form-data">

        <nav class="text-end">
            <a href="{{ route('app.product.list') }}" class="btn btn-dark fw-500">voltar</a>
        </nav>

        @csrf

        <div class="row pt-5">

            <div class="col col-12 col-md-6 bg-white p-5 rounded-2 shadow-2 mx-auto">

                <div class="form-outline mb-4">
                    <input type="text" name="title" required id="name" class="form-control" />
                    <label class="form-label" for="name">Nome</label>
                </div>

                <div class="form-outline mb-4">
                    <textarea name="description" class="form-control" id="desc" cols="30" rows="5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus totam hic vel, illum recusandae debitis velit harum laboriosam possimus magni sit maxime beatae commodi accusantium. Dicta, aut cumque? Harum, quod?</textarea>
                    <label class="form-label" for="desc">Descrição</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="number" step="0.01" name="price" required id="price" class="form-control" />
                    <label class="form-label" for="price">Preço</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="number" name="stock" required id="stock" class="form-control" value="{{ random_int(1, 100) }}" />
                    <label class="form-label" for="stock">Quantidade em estoque</label>
                </div>

                <div class="mb-4">
                    <label class="form-label d-inline fw-500" for="stock">Categoria</label>
                    <select name="category_id" class="form-control">
                        <option selected value="#"></option>
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

@endsection

@section('js')
@endsection