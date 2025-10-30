<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <a href="{{ route('games.index') }}" class="text-2xl font-bold text-indigo-600">
                    {{ config('app.name', 'Games') }}
                </a>
            </div>

            <div class="hidden sm:flex sm:space-x-8">
                <a href="{{ route('games.index') }}" 
                   class="inline-flex items-center px-1 pt-1 border-b-2 
                   {{ request()->routeIs('games.index') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}
                   text-sm font-medium transition duration-150 ease-in-out">
                    {{ __('games.my_games') }}
                </a>
                <a href="{{ route('games.create') }}" 
                   class="inline-flex items-center px-1 pt-1 border-b-2 
                   {{ request()->routeIs('games.create') ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }}
                   text-sm font-medium transition duration-150 ease-in-out">
                    {{ __('games.add_new') }}
                </a>
            </div>
            
            </div>
    </div>
</nav>