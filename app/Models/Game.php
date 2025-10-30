<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; // Importe o Builder
use Illuminate\Http\Request; // Importe o Request

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * Define os campos que podem ser preenchidos em massa.
     */
    protected $fillable = [
        'title',
        'developer',
        'release_year',
        'platform',
        'genre',
        'status',
        'rating',
        'cover_image_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'release_year' => 'integer',
            'rating' => 'integer',
        ];
    }

    /**
     * Escopo local para filtrar os jogos com base na busca e ordenação.
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeFilter(Builder $query, Request $request): Builder
    {
        // --- LÓGICA DE BUSCA MOVIDA PARA CÁ ---
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('developer', 'like', "%{$searchTerm}%");
            });
        }

        // --- LÓGICA DE ORDENAÇÃO MOVIDA PARA CÁ ---
        $sortableColumns = ['title', 'developer', 'release_year'];
        $sortBy = $request->query('sort_by', 'created_at');
        $sortDirection = $request->query('sort_direction', 'desc');

        if (in_array($sortBy, $sortableColumns) && in_array($sortDirection, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc'); // Fallback
        }

        return $query;
    }
}