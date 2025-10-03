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
    // Inicia a query para buscar jogos
    $query = Game::query();

    // Lógica da Busca (já implementada)
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('title', 'like', "%{$searchTerm}%")
              ->orWhere('developer', 'like', "%{$searchTerm}%");
        });
    }

    // --- INÍCIO DA NOVA LÓGICA DE ORDENAÇÃO ---
    // Define as colunas permitidas para ordenação para segurança
    $sortableColumns = ['title', 'developer', 'release_year'];
    $sortBy = $request->query('sort_by', 'created_at'); // Padrão: ordenar por data de criação
    $sortDirection = $request->query('sort_direction', 'desc'); // Padrão: descendente (mais novos primeiro)

    // Valida se a coluna e a direção são válidas
    if (in_array($sortBy, $sortableColumns) && in_array($sortDirection, ['asc', 'desc'])) {
        $query->orderBy($sortBy, $sortDirection);
    } else {
        // Fallback para a ordenação padrão se os parâmetros forem inválidos
        $query->orderBy('created_at', 'desc');
    }
    // --- FIM DA NOVA LÓGICA DE ORDENAÇÃO ---

    // Aplica a paginação
    $games = $query->paginate(10);

    // Retorna a view com os jogos e os parâmetros de ordenação
    return view('games.index', compact('games', 'sortBy', 'sortDirection'));
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
        // Não implementado, mas pode ser usado para uma página de detalhes do jogo
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