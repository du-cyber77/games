@extends('layouts.app')

@section('title', __('games.game_list'))

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold mb-8 text-center text-gray-800">{{ __('games.my_games') }}</h1>

        <div class="mb-6">
            <form action="{{ route('games.index') }}" method="GET">
                <div class="relative">
                    <input type="text" name="search" placeholder="Buscar por título ou desenvolvedora..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           value="{{ request('search') }}">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4 text-gray-500 hover:text-indigo-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </form>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        @php
                            $invertDirection = ($sortDirection == 'asc') ? 'desc' : 'asc';
                        @endphp
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('games.index', ['sort_by' => 'title', 'sort_direction' => $sortBy == 'title' ? $invertDirection : 'asc', 'search' => request('search')]) }}">
                                {{ __('games.title') }}
                                @if($sortBy == 'title')
                                    <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('games.index', ['sort_by' => 'developer', 'sort_direction' => $sortBy == 'developer' ? $invertDirection : 'asc', 'search' => request('search')]) }}">
                                {{ __('games.developer') }}
                                @if($sortBy == 'developer')
                                    <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="{{ route('games.index', ['sort_by' => 'release_year', 'sort_direction' => $sortBy == 'release_year' ? $invertDirection : 'asc', 'search' => request('search')]) }}">
                                {{ __('games.release_year') }}
                                @if($sortBy == 'release_year')
                                    <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                                @endif
                            </a>
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Plataforma
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gênero
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nota
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('games.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($games as $game)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center">
                                    @if($game->cover_image_url)
                                        <img class="w-10 h-14 object-cover rounded-md shadow-lg mr-4 flex-shrink-0" src="{{ $game->cover_image_url }}" alt="Capa de {{ $game->title }}">
                                    @else
                                        <div class="w-10 h-14 bg-gray-200 rounded-md shadow-lg mr-4 flex-shrink-0 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                    <a href="{{ route('games.show', $game->id) }}" class="truncate font-semibold text-indigo-600 hover:text-indigo-800 transition duration-150 ease-in-out">
                                        {{ $game->title }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $game->developer }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $game->release_year }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $game->platform ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $game->genre ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($game->status == 'Jogando') bg-blue-100 text-blue-800 
                                    @elseif($game->status == 'Finalizado') bg-green-100 text-green-800
                                    @elseif($game->status == 'Pausado') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ $game->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-500">
                                @if($game->rating)
                                    {{ str_repeat('★', $game->rating) }}<span class="text-gray-300">{{ str_repeat('☆', 5 - $game->rating) }}</span>
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('games.edit', $game->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                    {{ __('games.edit') }}
                                </a>
                                <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="inline-block delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        {{ __('games.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-6 text-gray-500">Nenhum jogo encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $games->appends(request()->query())->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');
            
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    // Usa a tradução do seu arquivo de lang
                    if (!confirm('{{ __("games.confirm_delete") }}')) { 
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endpush