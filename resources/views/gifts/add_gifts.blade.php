@extends('layouts.fo_layout')
@section('content')
    <h5>Olá podes adicionar uma prenda</h5>
    <form method="POST" action="{{ route('gifts.create') }}">
        @csrf
        <div class="mb-3">
            <label for="nome_prenda" class="form-label">Nome da prenda</label>
            <input type="text" name="nome_prenda" class="form-control" id="nome_prenda">
            @error('nome_prenda')
                nome inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="valor_previsto" class="form-label">Valor previsto</label>
            <input type="number" name="valor_previsto" class="form-control" id="valor_previsto" step="0.01"
                min="0">
            @error('valor_previsto')
                valor inválido
            @enderror
        </div>
        <div class="mb-3">
            <label for="valor_gasto" class="form-label">Valor gasto</label>
            <input type="number" name="valor_gasto" class="form-control" id="valor_gasto" step="0.01" min="0">
            @error('valor_gasto')
                valor inválido
            @enderror
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="form_need">Por favor escolha a pessoa responsável</label>
                <select id="form_need" name="user_id" class="form-control" required="required">
                    <option value="user_id" selected disabled>--Clique para ver os utilizadores--</option>
                    @foreach ($allUsers as $user)
                        <option value={{ $user->id }}>{{ $user->user_name }}</option>
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
