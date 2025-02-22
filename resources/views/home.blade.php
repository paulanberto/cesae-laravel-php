@extends('layouts.fo_layout')
@section('content')
    <div class="home">

        @auth
            <h5>Olá {{ Auth::user()->name }}</h5>

        @endauth


        <h5> {{ $myVar }}</h5>

        <img class="imagem" src="{{ asset('image/dev2.jpg') }}" alt="" height="200px" width="300px">



        <h6 class="contactoInfo"> Eu sou a {{ $contactoInfo['nome'] }} e desenvolvi este sistema</h6>



        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('image/dev.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Utilizadores</h5>
                            <p class="card-text">Gestão de utilizadores</p>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('users.show') }}" class="card-link">Ver todos os
                                utilizadores</a>
                            <a href="{{ route('users.add') }}" class="card-link">Adicionar Utilizador</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('image/tasks.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tarefas</h5>
                            <p class="card-text">Gestão de Tarefas</p>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('tasks') }}" class="card-link">Ver Tarefas</a>
                            <a href="{{ route('tasks.add') }}" class="card-link">Adicionar Tarefas</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="width: 25rem;">
                        <img src="{{ asset('image/gift.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Prendas</h5>
                            <p class="card-text">Gestão de prendas</p>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('gifts.all') }}" class="card-link">Ver Prendas</a>
                            <a href="{{ route('gifts.add') }}" class="card-link">Adicionar Prendas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
