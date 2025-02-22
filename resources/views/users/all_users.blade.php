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

    <div>
        <form action="">
            <input type="text" id="" name="search" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-secondary">Procurar</button>
        </form>

    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            @foreach ($allUsers as $user)
                <tr>
                    <td><img style="width:50px; height:50px"
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('image/noPhoto.jpg') }}"
                            alt=""></td>
                    <td scope="row">{{ $user->id }}</td>
                    <th>{{ $user->name }}</td>
                    <th>{{ $user->email }}</td>
                    <td><a class='btn btn-info' href="{{ route('users.view', $user->id) }}">Ver/Editar</a>

                        <a class='btn btn-danger' href="{{ route('users.delete', $user->id) }}">Excluir</a>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
