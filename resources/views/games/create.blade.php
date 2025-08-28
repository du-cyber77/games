<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Jogo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="p-4 sm:p-8 bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-xl bg-white rounded-xl shadow-2xl p-6 sm:p-10">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-indigo-700 mb-2">Adicionar Novo Jogo</h1>
        <form action="{{ route('games.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label for="developer" class="block text-sm font-medium text-gray-700">Desenvolvedora</label>
                <input type="text" name="developer" id="developer" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div>
                <label for="release_year" class="block text-sm font-medium text-gray-700">Ano de Lançamento</label>
                <input type="number" name="release_year" id="release_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out">
                Salvar Jogo
            </button>
            <a href="{{ route('games.index') }}" class="w-full sm:w-auto px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-bold hover:bg-gray-100 transition duration-300 ease-in-out block text-center sm:inline-block">
                Voltar
            </a>
        </form>
    </div>
</body>
</html>
