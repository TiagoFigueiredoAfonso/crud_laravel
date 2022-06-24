@extends('tema.base')

@section('conteudo')

    <div class="container py-5 text-center">
        @if(isset($cliente))
            <h3>Edição de Cliente</h3>
        @else
            <h3>Cadastro de Clientes</h3>
        @endif


        @if(isset($cliente))
        <form action="{{ route('cliente.update', $cliente)}}" method="post">
            @method('PUT') <!--laravel reconhece e usa esse método, é um modificador-->
        @else
            <form action="{{ route('cliente.store')}}" method="post">
        @endif
       

    
        @csrf

        <div class="-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome completo" value="{{ old('nome') ?? @$cliente->nome }}">
            <p class="form-text">Escreva o nome do cliente</p>
            @error('nome')
                <p class="form-text text-danger">{{ $message }}</p>            
            @enderror
        </div>
        <div class="-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" name="valor" class="form-control" placeholder="Digite o valor" step="0.01" value="{{ old('valor') ?? @$cliente->valor }}">
            <p class="form-text">Escreva o valor do cliente</p>
            @error('valor')
                <p class="form-text text-danger">{{ $message }}</p>            
            @enderror
        </div>
        <div class="-3">
            <label for="comentario" class="form-label">Comentário</label>
            <textarea name="comentario" cols="30" rows="4" class="form-control" value=" {{ old('comentario') ?? @$cliente->comentario }} "></textarea>
            <p class="form-text">Escreve o seu comentário</p>
            @error('comentario')
                <p class="form-text text-danger">{{ $message }}</p>            
            @enderror
        </div>

        @if(isset($cliente))
            <button type="submit" class=" btn btn-primary">Editar Cliente</button>
        @else
            <button type="submit" class=" btn btn-primary">Salvar Cliente</button>
        @endif

    </form>

    </div>

@endsection