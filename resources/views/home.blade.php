@extends('layouts.fo_layout')
@section('content')
    <h5>Olá estou em casa.</h5>
    <h6> {{$myVar}}</h6>
    <h6> {{$contactoInfo['nome']}}</h6>

    <img src="{{asset('image/image1.jpg')}}" alt="" height="200px" width="300px">
    <ul>
        <li><a href="{{ route('users.show') }}">Todos os users</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar Utilizador</a></li>
        <li><a href="{{ route('tasks') }}">Ver Tarefas</a></li>
        <li><a href="{{ route('tasks.add') }}">Adicionar Tarefas</a></li>
        <li><a href="{{ route('gifts.all') }}">Ver Prendas</a></li>
        <li><a href="{{ route('gifts.add') }}">Adicionar Prendas</a></li>

    </ul>
@endsection
