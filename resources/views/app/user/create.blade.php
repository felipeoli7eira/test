@extends('template')

@section('title', 'Laravel | Usuários')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5">

        <nav class="text-end mb-2">
            <a href="{{ route('app.user.list') }}" class="btn btn-dark fw-600">voltar</a>
        </nav>

        <form action="{{ route('app.user.store') }}" method="post" class="row bg-white p-5 rounded-3 shadow-1">

            @csrf

            <div class="col col-12 col-sm-6 mx-auto">

                <div class="row mb-3">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="first_name" required class="form-control" />
                            <label class="form-label">Primeiro nome</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="last_name" class="form-control" required />
                            <label class="form-label">Sobrenome</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-12 mb-3">
                        <div class="form-outline">
                            <input type="email" name="email" class="form-control" required />
                            <label class="form-label">E-mail</label>
                        </div>
                    </div>

                    <div class="col col-12 mb-3">
                        <div class="form-outline">
                            <input type="password" name="password" class="form-control" required />
                            <label class="form-label">Senha</label>
                        </div>
                    </div>

                    <div class="col col-12 mb-3">
                        <label class="d-inline fw-500">Nível de acesso</label>
                        <select name="level" class="form-control" required>
                            <option selected value="visitor">visitante</option>
                            <option value="collaborator">colaborador</option>
                            <option value="admin">administrador</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary fw-600">pronto</button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
@endsection