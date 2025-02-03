@extends('layouts.fo_layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-sucess">
            {{ session('message') }}
        </div>
    @endif

    @csrf
    <h1 class="mb-3">Lista de Presentes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor Previsto</th>
                <th>Valor Gasto</th>
                <th>Usuário</th>
                <th></th>
            </tr>
        </thead>
        @foreach ($gifts as $gift)
            <tr>
                <th scope="row">{{ $gift->id }}</th>
                <td>{{ $gift->nome_prenda }}</td>
                <td>{{ $gift->valor_previsto }}</td>
                <td>{{ $gift->valor_gasto }}</td>
                <td>{{ $gift->username }}</td>


                <td> <a class="btn btn-info" href="{{ route('gifts.view', $gift->id) }}">Ver/Editar</a>

                    <a class="btn btn-danger" href="{{ route('gifts.delete', $gift->id) }}">Apagar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
