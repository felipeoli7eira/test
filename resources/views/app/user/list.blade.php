@extends('template')

@section('title', 'Laravel | Usuários')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5" id="component-user-list">

        <nav class="text-end mb-2">
            <a href="{{ route('app.user.create') }}" class="btn btn-primary fw-600">cadastro de usuário</a>
        </nav>

        @if (count($users))
            @foreach ($users as $user)
                <div class="note note-light small rounded-0 fw-500 m-0 mb-3">
                    {{ $user->first_name }} {{ $user->last_name }} <span class="badge fw-400 rounded-1 bg-secondary">{{ $user->level }}</span>
                    <br>
                    <small class="text-muted fw-300">{{ $user->email }}</small>

                    <br>

                    <button v-on:click="setDataOnModalUpdate({{ $user }})" class="btn btn-info fw-600 btn-sm" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        atualizar
                    </button>
                    <form class="d-inline" action="{{ route('app.user.delete', ['id' => $user->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-sm btn-danger fw-600">deletar</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="note note-primary small rounded-1 fw-500">Nenhum usuário para listar</p>
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

                        <button
                        type="button"
                        class="btn-close"
                        data-mdb-dismiss="modal"
                        aria-label="Close"
                        ></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('app.user.update', ['id' => $user->id]) }}" method="post" class="">

                            @csrf

                            @method('put')

                            <input type="hidden" name="user_id" v-bind:value="user.id">
                
                            <div class="col col-12">
                
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="first_name" required v-bind:value="user.f_name" class="form-control" />
                                            <label class="form-label">Primeiro nome</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <input type="text" name="last_name" class="form-control" v-bind:value="user.l_name" required />
                                            <label class="form-label">Sobrenome</label>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="row">
                                    <div class="col col-12 mb-3">
                                        <div class="form-outline">
                                            <input type="email" name="email" v-bind:value="user.email" class="form-control" required />
                                            <label class="form-label">E-mail</label>
                                        </div>
                                    </div>
                
                                    <div class="col col-12 mb-3">
                                        <div class="form-outline">
                                            <input type="password" name="password" v-bind:value="user.password" class="form-control" required />
                                            <label class="form-label">Senha</label>
                                        </div>
                                    </div>
                
                                    <div class="col col-12 mb-3">
                                        <label class="d-inline fw-500">Nível de acesso</label>
                                        <select name="level" class="form-control" required v-model="user.level">
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

                    <div class="modal-footer">
                        <button v-on:click="setNull" type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                            cancelar
                        </button>
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

                el: '#component-user-list',

                data()
                {
                    return {
                        user: {
                            id: null,
                            f_name: null,
                            l_name: null,
                            email: null,
                            password: null,
                            level: null
                        }
                    }
                },

                methods: {
                    setDataOnModalUpdate(user)
                    {
                        this.user.id = user.id
                        this.user.f_name = user.first_name
                        this.user.l_name = user.last_name
                        this.user.email = user.email
                        this.user.password = user.password
                        this.user.level = user.level
                    },

                    setNull()
                    {
                        this.user.id = null
                        this.user.f_name = null
                        this.user.l_name = null
                        this.user.email = null
                        this.user.password = null
                        this.user.level = null
                    }
                }
            }
        )
    </script>

@endsection