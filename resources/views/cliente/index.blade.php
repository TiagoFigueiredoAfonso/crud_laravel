@extends('tema.base')

@section('conteudo')

    <div class="container py-5 text-center">
        <form action="{{ route('cliente.search') }}" method="post">
            @csrf
            <input type="text" name="searc" placeholder="Pesquisar">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <h1>Lista de Clientes</h1>
        @if(Session::has('mensagem'))
            <div class="alert alert-info my-5">
                    {{ Session::get('mensagem') }}
            </div>
        @endif
        <a href="{{ route('cliente.create') }}" class="btn btn-primary">Criar Cliente</a>

        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ações</th>
            </thead>
            <tbody>
            @forelse($clientes as $cliente)  
                <tr>                    
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->valor}}</td>
                   
                    <td>
                        <a class="btn btn-primary" href="{{ route('cliente.edit', $cliente) }}">Editar</a>

                        <form action="{{ route('cliente.destroy', $cliente) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja excluir essa informação?')">Excluir</button>


                        </form>
                      
                    </td>                    
                </tr>
                @empty
                <tr>
                    <td colspan="3">Não há registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        @if($clientes->count())
        {{ $clientes->links() }}
        @endif

    </div>

@endsection