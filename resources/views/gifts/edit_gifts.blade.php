@extends('layouts.fo_layout')
@section('content')
    <h5>Edite sua prenda</h5>
    <form method="POST" action="{{ route('gifts.update', $gift->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome_prenda" class="form-label">Nome da prenda</label>
            <input type="text" name="nome_prenda" class="form-control" id="nome_prenda" value="{{ $gift->nome_prenda }}">
            @error('nome_prenda')
                nome inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="valor_previsto" class="form-label">Valor previsto</label>
            <input type="number" name="valor_previsto" class="form-control" id="valor_previsto"
                value="{{ $gift->valor_previsto }}">
            @error('valor_previsto')
                valor inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="valor_gasto" class="form-label">Valor gasto</label>
            <input type="number" name="valor_gasto" class="form-control" id="valor_gasto" value="{{ $gift->valor_gasto }}">
            @error('valor_gasto')
                valor inválido
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="form_need">Por favor escolha a pessoa responsável</label>
                <select id="form_need" name="user_id" class="form-control" required="required">
                    <option value="">--Clique para ver os utilizadores--</option>
                    @foreach ($allUsers as $user)
                        <option value={{ $user->id }} {{ $user->id == $gift->user_id ? 'selected' : '' }}>
                            {{ $user->user_name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    userId inválido
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
