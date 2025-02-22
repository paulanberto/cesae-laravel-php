@extends('layouts.fo_layout')
@section('content')
    <div class="home">

        <div class="d-flex flex-column align-items-center justify-content-center text-center">
            @auth
                <h5>Olá {{ Auth::user()->name }}</h5>

                @if (Auth::user()->user_type == 1)
                    <div class="alert alert-light" role="alert">
                        <h4 class="alert-heading">Atenção!</h4>
                        <p>Esta é uma conta de administrador</p>
                    </div>
                @endif

            @endauth



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


    </div>
@endsection
