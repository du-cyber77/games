<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     * Exibe a lista de todos os jogos.
     */
    public function index()
    {
        // Recupera todos os jogos do banco de dados
        $games = Game::all();
        // Retorna a view 'games.index' passando os jogos
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     * Exibe o formulário para criar um novo jogo.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     * Salva um novo jogo no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados da requisição
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1950',
        ]);
        
        // Cria um novo registro no banco de dados
        Game::create($validatedData);

        // Redireciona de volta para a lista de jogos com uma mensagem de sucesso
        return redirect()->route('games.index')->with('success', 'Jogo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // Não precisamos de uma view separada para o show para este projeto simples
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        // Não precisamos de uma view de edição para este projeto simples
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // Não precisamos de um método de atualização para este projeto simples
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // Não precisamos de um método de exclusão para este projeto simples
    }
}
