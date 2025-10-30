<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. Inicia a query e aplica o escopo que criamos
        $query = Game::query()->filter($request);

        // 2. Aplica a paginação
        $games = $query->paginate(10);

        // 3. Retorna a view. 
        // Precisamos passar os parâmetros de ordenação de volta para a view
        // para que os links de cabeçalho da tabela funcionem.
        return view('games.index', [
            'games' => $games,
            'sortBy' => $request->query('sort_by', 'created_at'),
            'sortDirection' => $request->query('sort_direction', 'desc')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        Game::create($request->validated());

        return redirect()->route('games.index')->with('success', __('games.success_added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->validated());

        return redirect()->route('games.index')->with('success', __('games.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('games.index')->with('success', __('games.success_deleted'));
    }
}