<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'platform',       // Adicionado
        'genre',          // Adicionado
        'status',         // Adicionado
        'rating',         // Adicionado
        'cover_image_url',// Adicionado
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // 'release_year' já é integer na migration, mas cast é boa prática
            'release_year' => 'integer',
            'rating' => 'integer', // Garante que a nota seja sempre um número
        ];
    }
}