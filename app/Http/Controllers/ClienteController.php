<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(5);
        return view('cliente.index')
                ->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:30',
            'valor' => 'required|gte:10', //maior ou igual
            'comentario' => 'required'
        ]);
        $cliente = Cliente::create($request->only('nome', 'valor', 'comentario'));
        
       Session::flash('mensagem', 'Registrado com sucesso');
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.form')
            ->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|max:30',
            'valor' => 'required|gte:10', //maior ou igual
            'comentario' => 'required'
        ]);
       
        $cliente->nome = $request['nome'];
        $cliente->valor = $request['valor'];
        $cliente->comentario = $request['comentario'];
        $cliente->save();
        
       Session::flash('mensagem', 'Editado com sucesso');
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        Session::flash('mensagem', 'Excluído com sucesso');
        return redirect()->route('cliente.index');


    }

    public function search(Request $request) 
    {
        //dd("pesquisa por {$request->search}");usei p/ testar se chega aqui, tipo: var_dump

        $clientes = Cliente::where('nome', '=',"%{$request->search}%")
                            ->paginate();

        return view('cliente.index', compact('clientes'));
    }
}
