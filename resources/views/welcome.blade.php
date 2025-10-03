<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Gerenciador de Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Efeito de gradiente animado para o fundo */
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen text-white">

    <div class="text-center p-8 bg-black bg-opacity-50 rounded-2xl shadow-2xl backdrop-blur-md max-w-2xl mx-4">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight mb-4">
            Gerenciador de Jogos
        </h1>
        <p class="text-lg sm:text-xl text-gray-300 mb-8">
            A sua plataforma para organizar, cadastrar e gerenciar sua coleção de jogos.
        </p>
        <a href="{{ route('games.index') }}" 
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-lg py-4 px-10 rounded-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
            Acessar Minha Coleção
        </a>
    </div>

</body>
</html>