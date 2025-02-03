@extends('layouts.fo_layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-sucess">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="mb-3">Aqui vês todos os utilizadores</h1>

    <h6> O contato é {{ $contactPerson->name }} e o email {{ $contactPerson->email }}</h6>

    <h6> {{ $cesaeInfo['name'] }}</h6>


    <h6>Contactos</h6>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allUsers as $user)
                <tr>
                    <th scope="col">{{ $user->id }}</th>
                    <th scope="col">{{ $user->name }}</th>
                    <th scope="col">{{ $user->email }}</th>
                    <th scope="col"><a class='btn btn-info' href="{{ route('users.view', $user->id) }}">Ver</a></th>
                    <th scope="col"><a class='btn btn-info' href="{{ route('users.delete', $user->id) }}">Excluir</a>
                    </th>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
