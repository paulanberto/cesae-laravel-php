@extends('layouts.fo_layout')
@section('content')
  
    <h5>Olá podes adicionar tarefas</h5>
    <tr></tr>
    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da tarefa</label>
            <input type="text" name="name" class="form-control" aria-describedby="emailHelp">
            @error('name')
                name inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição da tarefa</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('description')
                descrição inválida
            @enderror
        </div>
        
        <div class="mb-3">
          <div class="form-group">
              <label for="form_need">Por favor escolha a pessoa responsável</label>
              <select id="form_need" name="user_id" class="form-control" required="required">
                  <option value="user_id" selected disabled>--Clique para ver os utilizadores--</option>
                  @foreach ($allUsers as $user)
                      <option value= {{ $user->id}}>{{ $user->user_name }}</option>
                  @endforeach
              </select>
              @error('user_id')
              userId inválido
          @enderror
          </div>
      </div>

        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection