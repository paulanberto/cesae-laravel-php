@extends('layouts.fo_layout')
@section('content')
    <h1>Aqui vês todas as prendas</h1>
    <hr>


    <h6>Nome da prenda: {{ $gift->nome_prenda }}</h6>
    <h6>Valor Previsto: {{ $gift->valor_previsto }} €</h6>
    <h6>Valor Gasto: {{ $gift->valor_gasto }} €</h6>
    <h6>Diferença: {{ $orcamento->valor_diferenca }} €</h6>
    <h6>Usuário: {{ $gift->username }}</h6>

    <td> <a class="btn btn-info" href="{{ route('gifts.edit', $gift->id) }}">Editar</a>
    @endsection
    </tbody>
    </table>
