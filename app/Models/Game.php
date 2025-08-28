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
    ];
}
