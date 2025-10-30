<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'title' => 'required|string|max:255',
        'developer' => 'required|string|max:255',
        'release_year' => 'required|integer|min:1950',
        
        // Novas regras (podem ser 'nullable' para não serem obrigatórias)
        'platform' => 'nullable|string|max:100',
        'genre' => 'nullable|string|max:100',
        'status' => 'nullable|string|max:50', // Você pode melhorar isso com Rule::in(['Jogando', ...])
        'rating' => 'nullable|integer|min:1|max:5', // Nota entre 1 e 5
        'cover_image_url' => 'nullable|url|max:255', // Valida se é uma URL válida
    ];
}
}