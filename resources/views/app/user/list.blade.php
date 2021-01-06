@extends('template')

@section('title', 'Laravel | Usuários')

@section('css')
@endsection

@section('content')

    @component('app.components.navbar')
    @endcomponent

    <div class="container mt-5">

        <nav class="text-end mb-2">
            <a href="{{ route('app.user.create') }}" class="btn btn-primary fw-600">cadastro de usuário</a>
        </nav>

        @if (count($users))
            @foreach ($users as $user)
                <p class="note note-light small rounded-0 fw-500 m-0">
                    {{ $user->first_name }} {{ $user->last_name }} <span class="badge fw-400 rounded-1 bg-secondary">{{ $user->level }}</span>
                    <br>
                    <small class="text-muted fw-300">{{ $user->email }}</small>

                </p>
            @endforeach
        @else
            <p class="note note-primary small rounded-1 fw-500">Nenhum usuário para listar</p>
        @endif
    </div>

@endsection

@section('js')
@endsection