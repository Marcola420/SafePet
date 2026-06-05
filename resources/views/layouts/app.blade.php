<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePet - Sistema de Adoção Responsável</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>

    <script>
    // Verifica as preferências anteriores do usuário
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // Função global para alternar o tema
    function toggleDarkMode() {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 flex flex-col min-h-screen transition-colors duration-300">

    <nav class="bg-white dark:bg-gray-800 shadow-md py-4 px-6 flex justify-between items-center transition-colors duration-300">
        <a href="{{ route('vitrine.index') }}" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 tracking-wide">🐾 SafePet</a>
        <div class="flex items-center space-x-4">
            <a href="{{ route('vitrine.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Vitrine</a>
            <a href="{{ route('sobre') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Sobre Nós</a>
            
            @auth
                @if(Auth::user()->eAdmin())
                    <a href="{{ route('admin.triagem') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Painel Triagem</a>
                    <a href="{{ route('admin.animais.index') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Gerenciar Pets</a>
                @else
                    <a href="{{ route('candidato.painel') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Meu Painel</a>
                @endif
                <span class="text-sm bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 px-3 py-1 rounded-full font-semibold">
                    Olá, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->tipo) }})
                </span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium text-sm">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">Entrar</a>
                <a href="{{ route('cadastro') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">Cadastrar</a>
            @endauth

            <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium transition-colors duration-300 focus:outline-none flex items-center justify-center border border-gray-200 dark:border-gray-600 w-10 h-10">
                <span class="block dark:hidden text-lg">🌙</span>
                <span class="hidden dark:block text-lg">☀️</span>
            </button>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @if(session('sucesso'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 dark:bg-green-900/50 dark:border-green-700 dark:text-green-200">
                {{ session('sucesso') }}
            </div>
        @endif
        @if(session('erro'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 dark:bg-red-900/50 dark:border-red-700 dark:text-red-200">
                {{ session('erro') }}
            </div>
        @endif

        @yield('conteudo')
    </main>

    <footer class="bg-gray-800 dark:bg-gray-950 text-white text-center py-4 text-sm mt-auto transition-colors duration-300">
        &copy; 2026 SafePet - Trabalho de Modelagem e Desenvolvimento Web TCC.
    </footer>

</body>
</html>