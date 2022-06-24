@extends('tema.base')

@section('conteudo')

    <div class="container py-5 text-center">
        <h1>Olá Mundo!</h1>
        <a href="{{ route('cliente.index') }}" class="btn btn-primary">Clientes</a>
    </div>

@endsection