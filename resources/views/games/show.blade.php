<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes: {{ $game->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen py-12 px-4 sm:px-6 lg:px-8">

    <div class="w-full max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                @if($game->cover_image_url)
                    <img class="h-full w-full object-cover md:w-60" src="{{ $game->cover_image_url }}" alt="Capa de {{ $game->title }}">
                @else
                    <div class="h-full w-full md:w-60 bg-gray-200 flex items-center justify-center">
                        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                @endif
            </div>

            <div class="p-8 w-full">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-indigo-700 mb-2">
                    {{ $game->title }}
                </h1>
                <h2 class="text-xl font-medium text-gray-600 mb-4">
                    {{ $game->developer }} ({{ $game->release_year }})
                </h2>

                <div class="mt-6 space-y-4">
                    <div class="flex flex-wrap gap-4 text-sm">
                        @if($game->platform)
                            <span class="bg-gray-200 text-gray-800 font-semibold px-3 py-1 rounded-full">{{ $game->platform }}</span>
                        @endif
                        @if($game->genre)
                            <span class="bg-blue-100 text-blue-800 font-semibold px-3 py-1 rounded-full">{{ $game->genre }}</span>
                        @endif
                    </div>
                    
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Status</span>
                        <span class="text-lg font-semibold text-gray-800">
                            {{ $game->status }}
                        </span>
                    </div>

                    @if($game->rating)
                    <div>
                        <span class="block text-xs font-medium text-gray-500 uppercase">Minha Nota</span>
                        <div class="text-2xl text-yellow-500 mt-1">
                            {{ str_repeat('★', $game->rating) }}<span class="text-gray-300">{{ str_repeat('☆', 5 - $game->rating) }}</span>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="mt-10 pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('games.edit', $game->id) }}" class="w-full sm:w-auto text-center px-6 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300 ease-in-out">
                        {{ __('games.edit') }}
                    </a>
                    <a href="{{ route('games.index') }}" class="w-full sm:w-auto text-center px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-bold hover:bg-gray-100 transition duration-300 ease-in-out">
                        {{ __('games.back') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>