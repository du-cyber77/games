<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cria a tabela 'games' com as colunas necessárias
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // A coluna "title"
            $table->string('developer'); // A coluna "developer"
            $table->integer('release_year'); // A coluna "release_year"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove a tabela 'games' se a migração for revertida
        Schema::dropIfExists('games');
    }
};
