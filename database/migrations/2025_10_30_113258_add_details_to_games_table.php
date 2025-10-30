<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Adiciona as novas colunas
            $table->string('platform')->nullable()->after('release_year');
            $table->string('genre')->nullable()->after('platform');
            $table->string('status')->default('Quero Jogar')->after('genre'); // Um valor padrão é útil
            $table->tinyInteger('rating')->nullable()->after('status'); // Nota de 1-5 (tinyInteger é eficiente)
            $table->string('cover_image_url')->nullable()->after('rating'); // URL para a imagem da capa
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Remove as colunas se precisarmos reverter
            $table->dropColumn([
                'platform',
                'genre',
                'status',
                'rating',
                'cover_image_url'
            ]);
        });
    }
};