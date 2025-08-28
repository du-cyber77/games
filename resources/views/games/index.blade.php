<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos Cadastrados</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="p-4 sm:p-8 bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-4xl bg-white rounded-xl shadow-2xl p-6 sm:p-10">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-indigo-700 mb-2">Jogos Cadastrados</h1>
        <div class="text-center mb-6">
            <a href="{{ route('games.create') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out">
                Adicionar Novo Jogo
            </a>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($games as $game)
                <div class="bg-gray-50 p-5 rounded-lg shadow-md border border-gray-200 transition-transform transform hover:scale-105">
                    <h3 class="font-bold text-lg text-gray-900">{{ $game->title }}</h3>
                    <p class="text-sm text-gray-600">Desenvolvedora: {{ $game->developer }}</p>
                    <p class="text-sm text-gray-600">Ano: {{ $game->release_year }}</p>
                </div>
            @empty
                <p class="text-center text-gray-500 mt-4 col-span-full">Nenhum jogo cadastrado ainda.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
