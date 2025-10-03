<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar rotas web para sua aplicação. Essas
| rotas são carregadas pelo RouteServiceProvider e todas receberão o
| grupo de middleware "web".
|
*/

// Nova rota principal: aponta para a view 'welcome' que acabamos de criar.
Route::get('/', function () {
    return view('welcome');
});

// A rota de recurso para o controlador de jogos.
// Ela cria automaticamente rotas para index, create, store, etc.
Route::resource('games', GameController::class);
