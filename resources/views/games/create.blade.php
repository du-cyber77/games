<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('games.add_new') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="p-4 sm:p-8 bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-xl bg-white rounded-xl shadow-2xl p-6 sm:p-10">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-indigo-700 mb-8">{{ __('games.add_new') }}</h1>
        
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                <strong>Opa!</strong> Havia algo errado com os dados:
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('games.store') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">{{ __('games.title') }}</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('title') }}" required>
            </div>
            <div>
                <label for="developer" class="block text-sm font-medium text-gray-700">{{ __('games.developer') }}</label>
                <input type="text" name="developer" id="developer" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('developer') }}" required>
            </div>
            <div>
                <label for="release_year" class="block text-sm font-medium text-gray-700">{{ __('games.release_year') }}</label>
                <input type="number" name="release_year" id="release_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('release_year') }}" required>
            </div>
            
            <div>
                <label for="platform" class="block text-sm font-medium text-gray-700">Plataforma</label>
                <input type="text" name="platform" id="platform" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('platform') }}" placeholder="Ex: PC, PS5, Switch">
            </div>
            
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700">Gênero</label>
                <input type="text" name="genre" id="genre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('genre') }}" placeholder="Ex: RPG, FPS, Estratégia">
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Quero Jogar" @selected(old('status') == 'Quero Jogar')>Quero Jogar</option>
                    <option value="Jogando" @selected(old('status') == 'Jogando')>Jogando</option>
                    <option value="Finalizado" @selected(old('status') == 'Finalizado')>Finalizado</option>
                    <option value="Pausado" @selected(old('status') == 'Pausado')>Pausado</option>
                </select>
            </div>
            
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Nota (1-5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('rating') }}">
            </div>
            
            <div>
                <label for="cover_image_url" class="block text-sm font-medium text-gray-700">URL da Capa</label>
                <input type="url" name="cover_image_url" id="cover_image_url" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('cover_image_url') }}" placeholder="https://...">
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3">
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out">
                    {{ __('games.save') }}
                </button>
                <a href="{{ route('games.index') }}" class="w-full sm:w-auto px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-bold hover:bg-gray-100 transition duration-300 ease-in-out block text-center">
                    {{ __('games.back') }}
                </a>
            </div>
        </form>
    </div>
</body>
</html>