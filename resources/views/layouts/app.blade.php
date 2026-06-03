<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePet - Sistema de Adoção Responsável</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-span-screen min-h-screen">

    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <a href="{{ route('vitrine.index') }}" class="text-2xl font-bold text-indigo-600 tracking-wide">🐾 SafePet</a>
        <div class="flex items-center space-x-4">
            <a href="{{ route('vitrine.index') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Vitrine</a>
            @auth
                @if(Auth::user()->eAdmin())
                    <a href="{{ route('admin.triagem') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Painel Triagem</a>
                    <a href="{{ route('admin.animais.index') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Gerenciar Pets</a>
                @else
                    <a href="{{ route('candidato.painel') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Meu Painel</a>
                @endif
                <span class="text-sm bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full font-semibold">
                    Olá, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->tipo) }})
                </span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 font-medium">Entrar</a>
                <a href="{{ route('cadastro') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">Cadastrar</a>
            @endauth
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @if(session('sucesso'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('sucesso') }}
            </div>
        @endif
        @if(session('erro'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('erro') }}
            </div>
        @endif

        @yield('conteudo')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 text-sm mt-auto">
        &copy; 2026 SafePet - Trabalho de Modelagem e Desenvolvimento Web TCC.
    </footer>

</body>
</html>